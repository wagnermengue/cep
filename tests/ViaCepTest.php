<?php

namespace Wagnermengue\Zipcode\Tests;

use Exception;
use PHPUnit\Framework\TestCase;
use Wagnermengue\Zipcode\ApiClients\ViaCep;

class ViaCepTest extends TestCase
{
    public function testFind()
    {
        $viaCep = new ViaCep();
        $result = $viaCep->find(93285630);
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
        $viaCep = new ViaCep();
        $this->expectException(Exception::class);
        $viaCep->find(00000000);
    }
}