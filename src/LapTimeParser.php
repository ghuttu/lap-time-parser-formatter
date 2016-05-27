<?php

namespace Ghuttu\Helpers;


class LapTimeParser
{

    /**
     * Lap time string, e.g. '1:21.764'
     * @var
     */
    private $lapTime;

    /**
     * LapTimeParser constructor.
     * @param $lapTime
     */
    public function __construct($lapTime)
    {
        $this->lapTime = $lapTime;
    }

    public function parse($lapTime = null)
    {
        if (!$lapTime) {
            $lapTime = $this->lapTime;
        }

        $parts = explode(':', $lapTime);

        // Lap time is under a minute
        if (!array_key_exists(1, $parts)) {
            return (float) $lapTime;
        }

        return ($parts[0] * 60) + $parts[1];
    }
}