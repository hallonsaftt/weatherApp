<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ForecastSearch extends Controller
{
    public function search(Request $request)
    {
        $cityname = $request->get('city');

        $cities = City::with('todaysForecast')->where("name", "LIKE" , "%$cityname%")->get();

        if($cities->count() == 0){
            return view('search-results-faild');
        }

        $userFavourites = [];

        if(Auth::check()){

            $userFavourites = Auth::user()->cityFavourites()->get();

            $userFavourites = $userFavourites->pluck('city_id')->toArray();

        }




        return view('search-results', compact('cities', 'userFavourites'));
    }



    public function home()
    {
        $cities = City::all();

        $userFavourites = collect();

        if (Auth::check()) {
            $userFavourites = City::whereIn('id', Auth::user()->cityFavourites()->pluck('city_id'))
                ->with('todaysForecast')
                ->get();
        }

        return view('home', compact('cities', 'userFavourites'));
    }




}
