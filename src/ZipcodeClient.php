<?php

namespace Wagnermengue\Zipcode;

use Exception;
use Wagnermengue\Zipcode\ApiClients\ApiClientInterface;
use Wagnermengue\Zipcode\ValueObjects\Zipcode;

class ZipcodeClient
{
    private $apiClient;

    public function __construct(ApiClientInterface $apiClient) {
        $this->apiClient = $apiClient;
    }

    /**
     * @throws Exception
     */
    public function find(int $zipcode)
    {
        $zipcodeObject = new Zipcode($zipcode); 
        return $this->apiClient->find($zipcodeObject);
    }
}