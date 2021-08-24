<?php

namespace App\Models;

class Forecast
{
    /**
     * Forecast constructor.
     */
    public function __construct(
        public string $location,
        public string $description,
        public float $temp,
        public float $feelsLike,
        public float $humidity,
        public int $visibility,
        public float $windSpeed,
        public int $windDeg,
        public float $windGust,
        public float $rainPastHour,
        public int $cloudCover,
        public int $sunrise,
        public int $sunset,
    ) {}
}
