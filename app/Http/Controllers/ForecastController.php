<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForecastPostRequest;
use App\Models\ForecastInquiry;
use App\Services\ForecastService;
use Carbon\Carbon;

class ForecastController extends Controller
{
    public function index()
    {
        return view('forecast.index');
    }

    public function store(ForecastPostRequest $request, ForecastService $forecastService)
    {
        $forecastInquiry = ForecastInquiry::make(
            $request->get('location'),
            $request->get('phone-number'),
            Carbon::create($request->get('date')),
        );

        $forecastService->create($forecastInquiry);

        return view('forecast.stored');
    }
}
