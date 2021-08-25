<?php

namespace Tests\Feature\Forecast;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use WithFaker;

    public function test_create_forecast_successful()
    {
        $phoneNumber = '07772353382';
        $date = Carbon::create('2021-05-04');

        $attributes = [
            'phone-number' => $phoneNumber,
            'date' => $date->format('Y-m-d'),
            'location' => 1
        ];

        $response = $this->post('/forecast', $attributes);
        $response->assertOk();

        $view = $this->get('/forecast/' . $date->format('d-m-y'));
        $view->assertSee($phoneNumber);
    }

    public function test_create_forecast_invalid_phone_number()
    {

    }
}
