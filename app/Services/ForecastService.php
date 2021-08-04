<?php

namespace App\Services;

use App\Models\ForecastInquiry;
use App\Repositories\Forecast\ForecastRepositoryInterface;

class ForecastService
{
    public function __construct(private ForecastRepositoryInterface $forecastRepository) {}

    public function create(ForecastInquiry $forecastInquiry)
    {
        return $this->forecastRepository->createItem($forecastInquiry);
    }

    public function getItems(string $number, string $date): \Illuminate\Support\Collection
    {
        return $this->forecastRepository->getItems($number, $date);
    }
}
