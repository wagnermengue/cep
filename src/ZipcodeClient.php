<?php

namespace Wagnermengue\Zipcode;

use Exception;
use Wagnermengue\Zipcode\ApiClients\ViaCep;
use Wagnermengue\Zipcode\Exceptions\InvalidZipcodeException;

class ZipcodeClient
{
    /**
     * @throws Exception
     */
    public function find(int $zipcode)
    {
        $length = strlen((string)$zipcode);
        if ($length != 8) {
            throw new InvalidZipcodeException();
        }
        $client = new ViaCep();
        return $client->find($zipcode);
    }
}