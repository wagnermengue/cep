<?php

namespace Wagnermengue\Zipcode\ValueObjects;

use Wagnermengue\Zipcode\Exceptions\InvalidZipcodeException;

class Zipcode 
{
    private $number;

    public function __construct(int $zipcode)
    {
        $this->validateNumber($zipcode);
        $this->number = $zipcode;
    }

    public function getNumber()
    {
        return $this->number;
    }

    private function validateNumber(int $number)
    {
        $length = strlen((string)$number);
        if ($length != 8) {
            throw new InvalidZipcodeException();
        }
    }
}