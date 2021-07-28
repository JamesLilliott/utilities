<?php

namespace App\Repositories\Forecast;

use App\Models\ForecastInquiry;

class AwsForecastRepository implements ForecastRepositoryInterface
{
    public function createItem(ForecastInquiry $forecastInquiry)
    {
        // TODO: Implement createItem() method.
        ray('aws create item', $forecastInquiry);
    }
}
