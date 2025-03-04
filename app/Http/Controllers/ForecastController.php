<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForecastController extends Controller
{


    public function index($city)
    {
        $forecasts = [
            "Beograd" => [
                "Ponedeljak" => 22,
                "Utorak" => 24,
                "Sreda" => 23,
                "Četvrtak" => 25,
                "Petak" => 21,
                "Subota" => 26,
                "Nedelja" => 27
            ],
            "Nis" => [
                "Ponedeljak" => 14,
                "Utorak" => 16,
                "Sreda" => 15,
                "Četvrtak" => 17,
                "Petak" => 13,
                "Subota" => 18,
                "Nedelja" => 19
            ],
            "Vranje" => [
                "Ponedeljak" => 25,
                "Utorak" => 27,
                "Sreda" => 26,
                "Četvrtak" => 28,
                "Petak" => 24,
                "Subota" => 29,
                "Nedelja" => 30
            ]
        ];

        // Konvertuj unos grada u format sa prvim velikim slovom
        $normalizedCity = ucfirst(strtolower($city));

        if(!array_key_exists($normalizedCity, $forecasts))
        {
            return view('forecast.error', ['city' => $city]);
        }

        $cityForecast = $forecasts[$normalizedCity];
        return view('forecast.show', [
            'city' => $normalizedCity,
            'forecast' => $cityForecast
        ]);
    }


}
