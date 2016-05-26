<?php

namespace Ghuttu\Helpers\LapTime;


class LapTime
{

    /**
     * Parse a lap time string into seconds
     * @param $lapTime
     * @return float
     */
    public static function toSeconds($lapTime)
    {
        $lapTimeParser = new LapTimeParser($lapTime);

        return $lapTimeParser->parse();
    }

    /**
     * Parse a lap time string into milliseconds
     * @param $lapTime
     * @return float
     */
    public static function toMillis($lapTime)
    {
        return self::toSeconds($lapTime) * 1000;
    }

    /**
     * Format a lap time string from milliseconds
     * @param $milliseconds
     * @return string
     */
    public static function fromMillis($milliseconds)
    {
        $lapTimeFormatter = new LapTimeFormatter($milliseconds);

        return $lapTimeFormatter->format();
    }

    /**
     * Format a lap time string from seconds
     * @param $seconds
     * @return string
     */
    public static function fromSeconds($seconds)
    {
        return self::fromMillis($seconds * 1000);
    }

}