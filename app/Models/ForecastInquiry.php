<?php

namespace App\Models;

use Carbon\Carbon;

class ForecastInquiry
{
    public int $locationId;
    public string $phoneNumber;
    public Carbon $date;

    /**
     * @param int $locationId
     * @param string $phoneNumber
     * @param Carbon $date
     * @return ForecastInquiry
     */
    public static function make(int $locationId, string $phoneNumber, Carbon $date)
    {
        return new self($locationId, $phoneNumber, $date);
    }

    /**
     * @param int $locationId
     * @param string $phoneNumber
     * @param Carbon $date
     */
    public function __construct(int $locationId, string $phoneNumber, Carbon $date)
    {
        $this->locationId = $locationId;
        $this->phoneNumber = $phoneNumber;
        $this->date = $date;
    }
}
