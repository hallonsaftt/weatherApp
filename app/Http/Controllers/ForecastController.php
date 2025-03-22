<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Services\WeatherService;
use http\Env\Request;
use Illuminate\Support\Facades\Http;



class ForecastController extends Controller
{
    public function index($cityName)
    {
        $city = City::where('name', $cityName)->first();


        if (!$city) {
            return view('forecast.error', ['city' => $cityName]);
        }


        $forecasts = $city->forecasts;

//        $response = Http::get(env("WEATHER_API_URL"). "v1//astronomy.json", [
//            'key' => env('WEATHER_API_KEY'),
//            'q' => $cityName,
//            'aqi' => 'no',
//            'days' => 1,
//        ]);
//
//        $jsonResponse = $response->json();
        $forecastService = new WeatherService();
        $jsonResponse = $forecastService->getForecastAstronomy($cityName);



        $sunrise = $jsonResponse['astronomy']['astro']['sunrise'];
        $sunset = $jsonResponse['astronomy']['astro']['sunset'];




        // Vraćamo view
        return view('forecast.show', [
            'city' => $city->name,
            'forecasts' => $forecasts
        ], compact('sunrise', 'sunset'));



//        $city = City::where('name', $cityName)->first();
//
//
//        if (!$city) {
//            return view('forecast.error', ['city' => $cityName]);
//        }
//
//
//        $forecasts = $city->forecasts;
//
//        // Vraćamo view
//        return view('forecast.show', [
//            'city' => $city->name,
//            'forecasts' => $forecasts
//        ]);


    }

}
