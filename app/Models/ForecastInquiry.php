<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ForecastInquiry
 *
 * @package App\Models
 * @property string $location
 * @property string $mobile_number
 * @property Carbon schedule_date
 * @method static create(array $array)
 */
class ForecastInquiry extends Model
{
    protected $table = 'forecast_inquiries';
    protected $attributes = ['location', 'mobile_number', 'schedule_date'];
    protected $fillable = ['location', 'mobile_number', 'schedule_date'];

    public static function selectByMobileNumber(string $mobileNumber): \Illuminate\Database\Eloquent\Collection
    {
        return self::query()->where('mobile_number', '=', $mobileNumber)->get();
    }

    public static function selectByMobileNumberAndDate(string $mobileNumber, string $date): \Illuminate\Database\Eloquent\Collection
    {
        return self::query()
            ->where('mobile_number', '=', $mobileNumber)
            ->where('schedule_date', '=', $date)
            ->get();
    }
}
