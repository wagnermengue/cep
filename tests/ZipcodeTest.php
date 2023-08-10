<?php

namespace Wagnermengue\Zipcode\Tests;

use PHPUnit\Framework\TestCase;
use Wagnermengue\Zipcode\Exceptions\InvalidZipcodeException;
use Wagnermengue\Zipcode\ValueObjects\Zipcode;

class ZipcodeTest extends TestCase
{
    public function testValidZipcode()
    {
        $zipcode = new Zipcode(11111111);
        $this->assertEquals(11111111, $zipcode->getNumber());
    }

    public function testInvalidZipcode()
    {
        $this->expectException(InvalidZipcodeException::class);
        new Zipcode(234);        
    }
}