<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForecastPostRequest;
use App\Models\ForecastInquiry;
use Carbon\Carbon;

class ForecastController extends Controller
{
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
        /** @var ForecastInquiry $forecastInquiry */
        $forecastInquiry = ForecastInquiry::create([
            'mobile_number' => $request->get('mobile_number'),
            'location' => $request->get('location'),
            'schedule_date' => Carbon::create($request->get('schedule_date')),
        ]);

        $forecastInquiry->save();

        return view('forecast.store', ['forecastInquiry' => $forecastInquiry]);
    }

    public function show(string $mobileNumber)
    {
        return view('forecast.index', [
            'items' => ForecastInquiry::selectByMobileNumber($mobileNumber)
        ]);
    }

    public function showWithDate(string $mobileNumber, string $date)
    {
        return view('forecast.index', [
            'items' => ForecastInquiry::selectByMobileNumberAndDate($mobileNumber, $date)
        ]);
    }
}
