<?php

namespace Tests;

use Aviator\Types\Exceptions\StringExceedsLength;
use Aviator\Types\LengthAwareString;
use Aviator\Types\Strategies\Throws;
use PHPUnit\Framework\TestCase;

class LengthAwareStringText extends TestCase
{
    /** @test */
    public function it_takes_a_string_and_a_length_and_validates_the_string ()
    {
        $instance = LengthAwareString::make('test', 4);

        $expected = 'test';

        $this->assertSame($expected, $instance->get());
    }
    
    /** @test */
    public function by_default_it_truncates_failing_strings ()
    {
        $instance = LengthAwareString::make('test', 3);

        $expected = 'tes';

        $this->assertSame($expected, $instance->get());
    }

    /** @test */
    public function it_accepts_optional_strategy_objects ()
    {
        $this->expectException(StringExceedsLength::class);

        $instance = LengthAwareString::make('test', 3, Throws::make());

        $instance->get();
    }

    /** @test */
    public function it_implements_toString ()
    {
        $instance = LengthAwareString::make('test', 4);

        $expected = 'test';

        $this->assertSame($expected, (string) $instance);
    }
}
