<?php

namespace Wagnermengue\Zipcode\ApiClients;

use Exception;
use Wagnermengue\Zipcode\Exceptions\NotFoundZipcodeException;
use Wagnermengue\Zipcode\ValueObjects\Zipcode;
class ViaCep
{
    private int $cep;
    private $curlHandle;
    public function find(Zipcode $zipcode)
    {
        $this->cep = $zipcode->getNumber();
        $this->makeHandle();
        $this->makeUrl();
        $this->configHandle();
        $result = $this->getResult();
        $this->validate();
        $this->destroyHandle();
        return $this->parseResponse($result);
    }

    private function makeHandle()
    {
        $this->curlHandle = curl_init();
    }

    private function makeUrl()
    {
        curl_setopt($this->curlHandle, CURLOPT_URL, "https://viacep.com.br/ws/$this->cep/json/");
    }

    private function configHandle()
    {
        curl_setopt($this->curlHandle, CURLOPT_RETURNTRANSFER, 1);
    }

    private function getResult()
    {
        return curl_exec($this->curlHandle);
    }

    private function validate()
    {
        $httpCode = $this->getHttpCode();
        if ($httpCode != 200) {
            throw new Exception('Does not a OK status code', $httpCode);
        }

        if(curl_error($this->curlHandle)) {
            throw new Exception('curl error', $httpCode);
        }
    }

    private function getHttpCode()
    {
        return curl_getinfo($this->curlHandle, CURLINFO_HTTP_CODE);
    }

    private function destroyHandle()
    {
        curl_close($this->curlHandle);
    }

    private function parseResponse($result)
    {
        $returnDecoded = json_decode($result);
        if(property_exists($returnDecoded, "erro")) {
            throw new NotFoundZipcodeException();
        }
        $data = [
            'logradouro' => $returnDecoded->logradouro,
            'complemento' => $returnDecoded->complemento,
            'bairro' => $returnDecoded->bairro,
            'cidade' => $returnDecoded->localidade,
            'uf' => $returnDecoded->uf,
        ];
        return json_encode($data);
    }
}
