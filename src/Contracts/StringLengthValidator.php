<?php

namespace Aviator\Types\Contracts;

use Aviator\Makeable\Interfaces\Makeable;

interface StringLengthValidator extends Makeable
{
    /**
     * Handle the string length check.
     * @param string $string
     * @param int $length
     * @return mixed
     */
    public function validate (string $string, int $length);
}
