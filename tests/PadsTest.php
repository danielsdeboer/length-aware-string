<?php

namespace Tests;

use Aviator\Types\Exceptions\StringExceedsLength;
use Aviator\Types\LengthAwareString;
use Aviator\Types\Strategies\Pads;
use Aviator\Types\Strategies\Throws;
use Aviator\Types\Strategies\Truncates;
use PHPUnit\Framework\TestCase;

class PadsTest extends TestCase
{
    /** @test */
    public function it_pad_strings_defaulting_to_right_pad_with_spaces ()
    {
        $instance = LengthAwareString::make('test', 10, Pads::make());

        $expected = 'test      ';

        $this->assertSame($expected, $instance->get());
    }

    /** @test */
    public function it_can_pad_with_characters ()
    {
        $instance = LengthAwareString::make('test', 12, Pads::make('string'));

        $expected = 'teststringst';

        $this->assertSame($expected, $instance->get());
    }

    /** @test */
    public function it_can_pad_on_the_left ()
    {
        $instance = LengthAwareString::make('test', 10, Pads::make('0', STR_PAD_LEFT));

        $expected = '000000test';

        $this->assertSame($expected, $instance->get());
    }

    /** @test */
    public function it_can_pad_on_both_sides ()
    {
        $instance = LengthAwareString::make('test', 10, Pads::make('0', STR_PAD_BOTH));

        $expected = '000test000';

        $this->assertSame($expected, $instance->get());
    }

    /** @test */
    public function it_can_take_an_optional_pre_pad_validator_to_handle_exceeding_lengths ()
    {
        $pads1 = new Pads('0', STR_PAD_BOTH, new Truncates);
        $pads2 = new Pads('0', STR_PAD_BOTH, new Throws);

        $instance = new LengthAwareString('test', 2, $pads1);

        $expected = 'te';

        $this->assertSame($expected, $instance->get());

        $this->expectException(StringExceedsLength::class);

        new LengthAwareString('test', 2, $pads2);
    }
}
