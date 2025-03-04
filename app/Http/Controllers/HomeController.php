<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {

        $prognoza = [
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

        return view('home', compact('prognoza'));
    }


}
