<?php

namespace App\Http\Controllers;

use App\Models\City;

class ForecastController extends Controller
{
    public function index($cityName)
    {

        $city = City::where('name', $cityName)->first();


        if (!$city) {
            return view('forecast.error', ['city' => $cityName]);
        }


        $forecasts = $city->forecasts;

        // Vraćamo view
        return view('forecast.show', [
            'city' => $city->name,
            'forecasts' => $forecasts
        ]);
    }
}
