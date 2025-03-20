<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\Forecast;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetRealWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-real-weather {city}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command use for sync real weather data';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $city = $this->argument('city');

        //get from city name like = $city
        $cityDB = City::where('name', $this->argument('city'))->first();

        //if not existi
        if($cityDB === null)
        {
            //crate new and give id
            $cityDB = City::create(['name' => $city]);

        }



        $response = Http::get(env("WEATHER_API_URL"). "v1/forecast.json", [
            'key' => env('WEATHER_API_KEY'),
            'q' => $city,
            'aqi' => 'no',
            'days' => 1,
                        ]);

//        dd($response->json());

        $jsonResponse = $response->json();

        if(isset($jsonResponse['error']))
        {
            $this->output->error($jsonResponse['error']['message']);
        }

        if($cityDB->todaysForecast !== null)
        {
            $this->output->comment('Command finished');
            return;
        }


        $forecastDate = $jsonResponse["forecast"]["forecastday"][0]["date"];
        $temperature = $jsonResponse["forecast"]["forecastday"][0]["day"]["avgtemp_c"];
        $weatherType = $jsonResponse["forecast"]["forecastday"][0]["day"]["condition"]["text"];
        $probability = $jsonResponse["forecast"]["forecastday"][0]["day"]["daily_chance_of_rain"];


        $forecast = [
            "city_id"  => $cityDB->id,
            "temperature" => $temperature,
            "date" => $forecastDate,
            "weather_type" => strtolower($weatherType),
            "probability" => $probability,
        ];

        Forecast::create($forecast);
        $this->output->comment('Command Add Succesfully');






    }
}
