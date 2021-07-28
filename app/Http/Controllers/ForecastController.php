<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForecastPostRequest;

class ForecastController extends Controller
{
    public function index()
    {
        return view('forecast.index');
    }

    public function store(ForecastPostRequest $request)
    {
        return view('forecast.stored');
    }
}
