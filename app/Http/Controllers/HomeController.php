<?php

namespace App\Http\Controllers;

use App\Models\City;

class HomeController extends Controller
{

    public function index()
    {

        $cities = City::all();


        return view('home', compact('cities'));
    }


}
