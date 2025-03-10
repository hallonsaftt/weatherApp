<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Forecast;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ForecastsTableSeeder extends Seeder
{
    public function run()
    {

        $faker = Faker::create();


        $cities = City::all();


        foreach ($cities as $city) {
            $previousTemperature = null;

            for ($i = 0; $i < 7; $i++) {

                $weatherType = Forecast::WEATHERS[rand(0, 3)];
                $probability = null;
                $temperature = null;

                if($weatherType == 'rainy' || $weatherType == 'snowy' || $weatherType == 'cloudy') {

                    $probability = rand(1, 100);
                }

                if($weatherType == 'cloudy') {
                    $temperature = rand(1, 15);
                }
                if($weatherType == 'rainy') {
                    $temperature = rand(-10, 50);
                }
                if($weatherType == 'snowy') {
                    $temperature = rand(1, -50);
                }
                if($weatherType == 'sunny') {
                    $temperature = rand(1, 50);
                }


                if (!is_null($previousTemperature)) {
                    $minTemp = max(-10, $previousTemperature - 10);
                    $maxTemp = min(50, $previousTemperature + 10);


                    $temperature = rand($minTemp, $maxTemp);
                }


                $previousTemperature = $temperature;




                Forecast::create([
                    'city_id'     => $city->id,
//                    'temperature' => $faker->numberBetween(-10, 40),
                    'temperature' => $temperature,
                    'date' => now()->addDays($i),
                    'weather_type' => $weatherType,
                    'probability' => $probability,
                ]);
            }
        }
    }
}
