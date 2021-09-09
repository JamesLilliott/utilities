<?php

namespace App\Console\Commands;

use App\Gateways\OpenWeatherMapGateway;
use App\Gateways\SmsGateway;
use App\Models\ForecastInquiry;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class SendForecastNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'forecast:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send daily forecast notification';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $forecastInquires = ForecastInquiry::query()
            ->where('schedule_date', '=', Carbon::today())
            ->get();

        $weatherGateway = new OpenWeatherMapGateway(
            new Client()
        );

        $smsGateway = new SmsGateway();


        /** @var ForecastInquiry $forecastInquire */
        foreach ($forecastInquires as $forecastInquire) {
            $forecast = $weatherGateway->getForecast($forecastInquire->location . ',GB');
            $smsGateway->send($forecastInquire, $forecast);
        }

        return 0;
    }
}
