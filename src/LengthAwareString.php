<?php

namespace Aviator\Types;

use Aviator\Makeable\Interfaces\Makeable;
use Aviator\Makeable\Traits\MakeableTrait;
use Aviator\Types\Contracts\StringLengthValidator;
use Aviator\Types\Strategies\Truncates;

class LengthAwareString implements Makeable
{
    use MakeableTrait;

    /** @var string */
    protected $string;

    /** @var int */
    protected $length;

    /** @var \Aviator\Types\Contracts\StringLengthValidator */
    protected $validator;

    /**
     * Constructor.
     * @param string $string
     * @param int $length
     * @param \Aviator\Types\Contracts\StringLengthValidator|null $validator
     */
    public function __construct (
        string $string,
        int $length,
        StringLengthValidator $validator = null
    )
    {
        $this->setValidator($validator);

        $this->string = $this->validator->validate($string, $length);
    }

    /**
     * Get the string.
     * @return string
     */
    public function get () : string
    {
        return $this->string;
    }

    /**
     * Set the validation strategy.
     * @param \Aviator\Types\Contracts\StringLengthValidator|null $validator
     */
    public function setValidator (StringLengthValidator $validator = null)
    {
        $this->validator = $validator ?: Truncates::make();
    }

    /**
     * @return mixed|string
     */
    public function __toString ()
    {
        return $this->string;
    }
}
