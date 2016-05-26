<?php

class LapTimeTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function can_parse_to_seconds_from_a_lap_time_string()
    {
        $this->assertEquals(65.791, \Ghuttu\Helpers\LapTime\LapTime::toSeconds('1:05.791'));
    }

    /** @test */
    public function can_parse_to_milliseconds_from_a_lap_time_string()
    {
        $this->assertEquals(97100, \Ghuttu\Helpers\LapTime\LapTime::toMillis('1:37.100'));
    }

    /** @test */
    public function can_parse_when_lap_time_is_under_a_minute()
    {
        $this->assertEquals(56237, \Ghuttu\Helpers\LapTime\LapTime::toMillis('56.237'));
    }

    /** @test */
    public function can_parse_when_lap_time_is_flat()
    {
        $this->assertEquals(60000, \Ghuttu\Helpers\LapTime\LapTime::toMillis('1:00.000'));
    }

    /** @test */
    public function can_return_valid_format_from_millis()
    {
        $this->assertEquals('1:26.251', \Ghuttu\Helpers\LapTime\LapTime::fromMillis(86251));
    }

    /** @test */
    public function can_return_valid_format_from_seconds()
    {
        $this->assertEquals('1:15.999', \Ghuttu\Helpers\LapTime\LapTime::fromSeconds(75.999));
    }

    /** @test */
    public function can_return_valid_format_when_lap_time_is_under_a_minute()
    {
        $this->assertEquals('37.156', \Ghuttu\Helpers\LapTime\LapTime::fromSeconds(37.156));
    }

    /** @test */
    public function can_return_valid_format_when_lap_time_is_flat()
    {
        $this->assertEquals('1:00.000', \Ghuttu\Helpers\LapTime\LapTime::fromSeconds(60));
    }
}
