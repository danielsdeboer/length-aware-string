<?php

namespace Aviator\Types\Strategies;

use Aviator\Makeable\Traits\MakeableTrait;
use Aviator\Types\Contracts\StringLengthValidator;

class Truncates implements StringLengthValidator
{
    use MakeableTrait;

    /**
     * Handle the string length check, truncating the string on failure.
     * @param string $string
     * @param int $length
     * @return string
     */
    public function validate (string $string, int $length)
    {
        return strlen($string) > $length
            ? substr($string, 0, $length)
            : $string;
    }
}

