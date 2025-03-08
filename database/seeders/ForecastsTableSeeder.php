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
            for ($i = 0; $i < 7; $i++) {

                $weatherType = Forecast::WEATHERS[rand(0, 2)];
                $probability = null;

                if($weatherType == 'rainy' || $weatherType == 'snowy') {

                    $probability = rand(1, 100);
                }

                Forecast::create([
                    'city_id'     => $city->id,
                    'temperature' => $faker->numberBetween(-10, 40),
                    'date'        => $faker->dateTimeBetween('-1 week', '+1 week'),
                    'weather_type' => $weatherType,
                    'probability' => $probability,
                ]);
            }
        }
    }
}
