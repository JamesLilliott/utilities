<?php

namespace App\Repositories\Forecast;

use App\Models\ForecastInquiry;

interface ForecastRepositoryInterface
{
    public function createItem(ForecastInquiry $forecastInquiry);
}

