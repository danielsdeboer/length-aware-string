<?php

namespace Aviator\Types\Strategies;

use Aviator\Makeable\Traits\MakeableTrait;
use Aviator\Types\Contracts\StringLengthValidator;

class Pads implements StringLengthValidator
{
    use MakeableTrait;

    /** @var string */
    private $padWith;

    /** @var string */
    private $side;

    /** @var \Aviator\Types\Contracts\StringLengthValidator */
    private $validator;

    /**
     * Constructor.
     * @param string $padWith
     * @param string $side
     * @param \Aviator\Types\Contracts\StringLengthValidator $validator
     */
    public function __construct (
        string $padWith = ' ',
        string $side = STR_PAD_RIGHT,
        StringLengthValidator $validator = null
    )
    {
        $this->padWith = $padWith;
        $this->side = $side;

        $this->validator = $validator ?: new Truncates;
    }

    /**
     * Handle the string length check, left padding with zeros
     * to the desired length.
     * @param string $string
     * @param int $length
     * @return string
     */
    public function validate (string $string, int $length)
    {
        $string = $this->validator->validate($string, $length);

        return str_pad($string, $length, $this->padWith, $this->side);
    }
}

