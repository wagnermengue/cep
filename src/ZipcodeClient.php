<?php

namespace Wagnermengue\Zipcode;

use Exception;
use Wagnermengue\Zipcode\ApiClients\ViaCep;
use Wagnermengue\Zipcode\Exceptions\InvalidZipcodeException;
use Wagnermengue\Zipcode\ValueObjects\Zipcode;

class ZipcodeClient
{
    /**
     * @throws Exception
     */
    public function find(int $zipcode)
    {
        $zipcodeObject = new Zipcode($zipcode);
        $client = new ViaCep();
        return $client->find($zipcodeObject);
    }
}