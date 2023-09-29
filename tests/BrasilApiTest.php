<?php

namespace Wagnermengue\Zipcode\Tests;

use PHPUnit\Framework\TestCase;
use Wagnermengue\Zipcode\ApiClients\BrasilApi;
use Wagnermengue\Zipcode\Exceptions\NotFoundZipcodeException;
use Wagnermengue\Zipcode\ValueObjects\Zipcode;

class BrasilApiTest extends TestCase
{
    public function testFind()
    {
        $BrasilApi = new BrasilApi();
        $zipcode = new Zipcode(93285630);
        $result = $BrasilApi->find($zipcode);
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

    public function testFindInvalidCep()
    {
        $BrasilApi = new BrasilApi();
        $zipcode = new Zipcode(11111111);
        $this->expectException(NotFoundZipcodeException::class);
        $BrasilApi->find($zipcode);
    }
}