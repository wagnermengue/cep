<?php

namespace Wagnermengue\Zipcode\Tests;

use Exception;
use PHPUnit\Framework\TestCase;
use Wagnermengue\Zipcode\ApiClients\Postmon;
use Wagnermengue\Zipcode\ValueObjects\Zipcode;

class PostmonTest extends TestCase
{
    public function testFind()
    {
        $postmon = new Postmon();
        $zipcode = new Zipcode(93285630);
        $result = $postmon->find($zipcode);
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

    // public function testFindInvalidCep()
    // {
    //     // $viaCep = new ViaCep();
    //     // $zipcode = new Zipcode(11111111);
    //     // $this->expectException(Exception::class);
    //     // $viaCep->find($zipcode);
    // }
}
