<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;



class WeatherService
{
    public function getForecast($city)
    {
        $response = Http::get(env("WEATHER_API_URL"). "v1/forecast.json", [
            'key' => env('WEATHER_API_KEY'),
            'q' => $city,
            'aqi' => 'no',
            'days' => 1,
        ]);

        return $response->json();
    }

    public function getForecastAstronomy($cityName)
    {
        $response = Http::get(env("WEATHER_API_URL"). "v1//astronomy.json", [
            'key' => env('WEATHER_API_KEY'),
            'q' => $cityName,
            'aqi' => 'no',
            'days' => 1,
        ]);

        return $response->json();
    }
}
