<?php

namespace Wagnermengue\Zipcode;

use Wagnermengue\Zipcode\ApiClients\ViaCep;

class Client
{
    public function find(int $zipcode)
    {
        $client = new ViaCep();
        return $client->find($zipcode);
    }
}