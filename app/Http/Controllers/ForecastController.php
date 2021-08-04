<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForecastPostRequest;
use App\Models\ForecastInquiry;
use App\Services\ForecastService;
use Carbon\Carbon;

class ForecastController extends Controller
{
    public function __construct(private ForecastService $forecastService) {}

    public function index()
    {
        return view('forecast.index');
    }

    public function create()
    {
        return view('forecast.create');
    }

    public function store(ForecastPostRequest $request)
    {
        $forecastInquiry = ForecastInquiry::make(
            $request->get('location'),
            $request->get('phone-number'),
            Carbon::create($request->get('date')),
        );

        $this->forecastService->create($forecastInquiry);

        return view('forecast.store', ['forecastInquiry' => $forecastInquiry]);
    }

    public function show(string $id)
    {
        $forecastInquiries = $this->forecastService->getItems($id, '21');

        return view('forecast.index', ['items' => $forecastInquiries]);
    }

    public function showWithDate(string $id, string $date)
    {
        $forecastInquiries = $this->forecastService->getItems($id, $date);

        return view('forecast.index', ['items' => $forecastInquiries]);
    }
}
