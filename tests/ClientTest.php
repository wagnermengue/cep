<?php

namespace Wagnermengue\Zipcode\Tests;

use PHPUnit\Framework\TestCase;
use Wagnermengue\Zipcode\Client;

class ClientTest extends TestCase
{
    public function testFind()
    {
        $client = new Client();
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
}