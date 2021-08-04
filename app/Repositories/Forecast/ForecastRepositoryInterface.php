<?php

namespace App\Repositories\Forecast;

use App\Models\ForecastInquiry;
use Illuminate\Support\Collection;

interface ForecastRepositoryInterface
{
    public function createItem(ForecastInquiry $forecastInquiry);
    public function getItems(string $number, string $date): Collection;
}

