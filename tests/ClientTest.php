<?php

namespace Wagnermengue\Zipcode\Tests;

use PHPUnit\Framework\TestCase;
use Wagnermengue\Zipcode\ApiClients\BrasilApi;
use Wagnermengue\Zipcode\Exceptions\InvalidZipcodeException;
use Wagnermengue\Zipcode\Exceptions\NotFoundZipcodeException;
use Wagnermengue\Zipcode\ZipcodeClient;

class ClientTest extends TestCase
{
    public function testFind()
    {
        $brasilApi = new BrasilApi();
        $client = new ZipcodeClient($brasilApi);
        $result = $client->find(93285630);
        $expected = json_encode([
            "logradouro" => "Rua José Casemiro Castilhos",
            "complemento" => "",
            "bairro" => "Olímpica",
            "cidade" => "Esteio",
            "uf" => "RS",
        ]);
        $this->assertJson($result);
        $this->assertEquals($expected, $result);
    }

    public function testValidateZipcodeStructure()
    {
        $brasilApi = new BrasilApi();
        $client = new ZipcodeClient($brasilApi);
        $this->expectException(InvalidZipcodeException::class);
        $client->find(2345);
    }

    public function testZipcodeNotFound()
    {
        $brasilApi = new BrasilApi();
        $client = new ZipcodeClient($brasilApi);
        $this->expectException(NotFoundZipcodeException::class);
        $client->find(11111111);
    }
}