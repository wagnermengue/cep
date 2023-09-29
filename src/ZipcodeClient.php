<?php

namespace Wagnermengue\Zipcode;

use Exception;
use Wagnermengue\Zipcode\ApiClients\BrasilApi;
use Wagnermengue\Zipcode\ApiClients\ViaCep;
use Wagnermengue\Zipcode\ValueObjects\Zipcode;

class ZipcodeClient
{
    /**
     * @throws Exception
     */
    public function find(int $zipcode, $input)
    {
        $zipcodeObject = new Zipcode($zipcode); 
        if ($input == "brasil-api") {
            $client = new BrasilApi();
            return $client->find($zipcodeObject);
        } 
        $client = new ViaCep();
        return $client->find($zipcodeObject);
    }
}