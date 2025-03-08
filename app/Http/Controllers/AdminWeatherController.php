<?php

namespace App\Http\Controllers;

use App\Models\Forecast;
use App\Models\WeatherModel;
use Illuminate\Http\Request;

class AdminWeatherController extends Controller
{
    public function createWeather(Request $request)
    {


        $request->validate([
            'city_id'      => 'required|exists:cities,id',
            'temperature'  => 'required|numeric',
            'weather_type' => 'required|in:sunny,rainy,snowy',
            'probability'  => '',
            'date'         => 'required|date',
        ]);


        Forecast::create([
            'city_id'      => $request->input('city_id'),
            'temperature'  => $request->input('temperature'),
            'weather_type' => $request->input('weather_type'),
            'probability'  => $request->input('probability'),
            'date'         => $request->input('date'),
        ]);

//        return redirect()->back();
        return redirect()->route('admin.weather')->with('success', 'Forecast kreiran uspesno!@');

    }

    public function update(Request $request)
    {

        $request->validate([
            'city_id'      => 'required|exists:cities,id',
            'temperature'  => 'required|numeric',
            'weather_type' => 'required|in:sunny,rainy,snowy',
            'probability'  => '',
            'date'         => 'required|date',
        ]);

        dd($request->all());



        return redirect()->route('admin.weather')->with('success', 'Forecast kreiran uspesno!@');

    }
}
