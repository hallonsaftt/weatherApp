<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserCities as UserCitiesModel;


class UserCities extends Controller
{
//    public function favourite(Request $request, $city)
//    {
//
//
//        $user = Auth::user();
//
//        if($user === null){
//
//            return redirect()->back()->with(['error' => "Morate biti ulogovani da staviti grad u Favorite"]);
//        }
//
//        \App\Models\UserCities::create([
//
//            'city_id' => $city,
//            'user_id' => $user->id,
//        ]);
//
//        return redirect()->back();
//    }


    public function favourite(Request $request, $city)
    {
        $user = Auth::user();

        if($user === null){
            return redirect()->back()->with(['error' => "Morate biti ulogovani da stavite grad u Favorite"]);
        }


        $existing = UserCitiesModel::where('user_id', $user->id)
            ->where('city_id', $city)
            ->first();

        if($existing) {

            $existing->delete();
            return redirect()->back()->with('success', 'Grad je uklonjen iz favorita!');
        } else {

            UserCitiesModel::create([
                'city_id' => $city,
                'user_id' => $user->id,
            ]);
            return redirect()->back()->with('success', 'Grad je dodat u favorite!');
        }
    }


    public function index()
    {

        $cities = \App\Models\City::all();


        $userFavourites = [];
        if (\Illuminate\Support\Facades\Auth::check()) {
            $userFavourites = \App\Models\City::whereIn('id', \Illuminate\Support\Facades\Auth::user()
                ->cityFavourites()
                ->pluck('city_id')
            )
                ->with('todaysForecast')
                ->get();
        }


        return view('home', compact('cities', 'userFavourites'));
    }





}
