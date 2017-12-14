<?php

namespace Aviator\Types\Strategies;

use Aviator\Makeable\Traits\MakeableTrait;
use Aviator\Types\Contracts\StringLengthValidator;
use Aviator\Types\Exceptions\StringExceedsLength;

class Throws implements StringLengthValidator
{
    use MakeableTrait;

    /**
     * Handle the string length check, throwing an exception on failure.
     * @param string $string
     * @param int $length
     * @return string
     * @throws \Aviator\Types\Exceptions\StringExceedsLength
     */
    public function validate (string $string, int $length)
    {
        if (strlen($string) > $length) {
            throw new StringExceedsLength;
        }

        return $string;
    }
}

