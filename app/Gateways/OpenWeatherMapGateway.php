<?php

namespace App\Gateways;

use App\Models\Forecast;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Client\ClientInterface;

class OpenWeatherMapGateway
{
    const URL = 'https://api.openweathermap.org/data/2.5';

    private ClientInterface $client;

    /**
     * OpenWeatherMapGateway constructor.
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getForecast(string $location): Forecast
    {
        $request = new Request(
            'POST',
            self::URL . '/weather?q=' . $location . '&appid=' . env('OPEN_WEATHER_API_KEY'). ''
        );

        $response = $this->client->sendRequest($request);
        $forecastData = json_decode($response->getBody()->getContents(), JSON_OBJECT_AS_ARRAY);

        return $this->mapToForecast($forecastData);

    }

    private function mapToForecast(array $forecastResponse)
    {
        return new Forecast(
            $forecastResponse['name'],
            $forecastResponse['weather'][0]['description'],
            $forecastResponse['main']['temp'],
            $forecastResponse['main']['feels_like'],
            $forecastResponse['main']['humidity'],
            $forecastResponse['visibility'],
            $forecastResponse['wind']['speed'],
            $forecastResponse['wind']['deg'],
            $forecastResponse['wind']['gust'] ?? 0,
            $forecastResponse['rain']['1h']?? 0,
            $forecastResponse['clouds']['all'],
            $forecastResponse['sys']['sunrise'],
            $forecastResponse['sys']['sunset'],
        );
    }
}
