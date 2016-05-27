<?php

namespace Ghuttu\Helpers;


class LapTimeFormatter
{

    /**
     * Lap time in milliseconds
     * @var
     */
    private $millis;

    /**
     * LapTimeParser constructor.
     * @param $millis
     */
    public function __construct($millis)
    {
        $this->millis = $millis;
    }

    /**
     * Format given lap time to a string
     * @param null $millis
     * @return string
     */
    public function format($millis = null)
    {
        if (!$millis) {
            $millis = $this->millis;
        }

        if (is_null($millis)) {
            return '';
        }

        $parts = explode('.', $millis / 1000);
        $minutes = (int) ($parts[0] / 60);
        $seconds = $this->getSeconds($parts[0]);
        $milliseconds = $this->getMilliseconds($parts, $millis);

        return $this->formatLapTimeString($minutes, $seconds, $milliseconds);
    }

    protected function getSeconds($seconds)
    {
        $seconds = $seconds % 60;

        if ($seconds < 10) {
            $seconds = '0' . $seconds;
        }

        return $seconds;
    }

    protected function getMilliseconds($parts, $millis)
    {
        // If lap time is 'flat', (e.g. 1:12.000), add ms 0's
        if (!array_key_exists(1, $parts)) {
            $milliseconds = '000';
        } else {
            $milliseconds = $parts[1];

            // If the last one or two digits of the lap time were 0's, add those back
            $milliseconds .= substr($millis, -1) == 0 ? '0' : '';
            $milliseconds .= substr($millis, -2) == 0 ? '0' : '';
        }

        return $milliseconds;
    }

    protected function formatLapTimeString($minutes, $seconds, $milliseconds)
    {
        $formattedLapTime = $minutes === 0 ? '' : $minutes . ':'; // Add minutes
        $formattedLapTime .= $seconds.'.'; // Add seconds
        $formattedLapTime .= $milliseconds; // Add milliseconds

        return $formattedLapTime;
    }

}