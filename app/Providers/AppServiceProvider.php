<?php

namespace App\Providers;

use App\Repositories\Forecast\AwsForecastRepository;
use App\Repositories\Forecast\ForecastRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            ForecastRepositoryInterface::class,
            AwsForecastRepository::class
        );
    }
}
