<?php

namespace App\Http\Controllers;

class WeatherController extends Controller
{



    public function index()
    {
        $prognoza = [
            "Beograd" => 22,
            "Nis" => 14,
            "Vranje" => 25,
        ];


        return view('weather', compact('prognoza'));
    }


    public function forecast()
    {

    }
}
