<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        $cities = City::all();


        $userFavourites = [];
        if (Auth::check()) {

            $userFavourites = City::whereIn('id', Auth::user()->cityFavourites()->pluck('city_id'))
                ->with('todaysForecast')
                ->get();
        }


        return view('home', compact('cities', 'userFavourites'));
    }
}
