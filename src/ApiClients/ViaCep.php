<?php

namespace Wagnermengue\Zipcode\ApiClients;

use Exception;

class ViaCep
{
    private $curlHandle;
    public function find(int $cep)
    {
        $this->makeHandle();
        $this->makeUrl($cep);
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

    private function makeUrl(int $cep)
    {
        curl_setopt($this->curlHandle, CURLOPT_URL, "https://viacep.com.br/ws/$cep/json/");
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
            throw new Exception('Zipcode not found', $httpCode);
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
