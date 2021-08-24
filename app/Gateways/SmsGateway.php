<?php

namespace App\Gateways;

use App\Models\Forecast;
use App\Models\ForecastInquiry;
use Illuminate\Support\Facades\Log;

class SmsGateway
{
    public function send(ForecastInquiry $inquiry, Forecast $forecast)
    {
        Log::info(
            'Sending SMS to ' . $inquiry->mobile_number .
            '. Weather in ' . $inquiry->location . ' is ' . $forecast->description
        );
    }
}
