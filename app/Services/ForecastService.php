<?php

namespace App\Services;

use App\Models\ForecastInquiry;
use App\Repositories\Forecast\ForecastRepositoryInterface;

class ForecastService
{
    private ForecastRepositoryInterface $forecastRepository;

    public function __construct(ForecastRepositoryInterface $forecastRepository)
    {
        $this->forecastRepository = $forecastRepository;
    }

    public function create(ForecastInquiry $forecastInquiry)
    {
        return $this->forecastRepository->createItem($forecastInquiry);
    }
}
