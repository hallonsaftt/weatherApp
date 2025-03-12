<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class ForecastSearch extends Controller
{
    public function search(Request $request)
    {
        $cityname = $request->get('city');

        $cities = City::with('todayForecasts')->where("name", "LIKE" , "%$cityname%")->get();

        if($cities->count() == 0){
            return view('search-results-faild');
        }

        return view('search-results', compact('cities'));
    }
}
