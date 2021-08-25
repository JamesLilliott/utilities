<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForecastPostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'location' => ['required', 'string'],
            'mobile_number' => ['required', 'regex:(07[\d]{8,12}|447[\d]{7,11})'],
            'schedule_date' => ['required', 'date'],
        ];
    }
}
