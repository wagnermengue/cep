<?php

namespace Wagnermengue\Zipcode\ApiClients;

use Wagnermengue\Zipcode\ValueObjects\Zipcode;

interface ApiClientInterface
{
    public function find(Zipcode $zipcode);
}