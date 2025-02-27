<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
