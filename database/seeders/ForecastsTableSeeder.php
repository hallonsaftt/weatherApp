<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\Forecast;
use Faker\Factory as Faker;

class ForecastsTableSeeder extends Seeder
{
    public function run()
    {

        $faker = Faker::create();


        $cities = City::all();


        foreach ($cities as $city) {
            for ($i = 0; $i < 7; $i++) {
                Forecast::create([
                    'city_id'     => $city->id,
                    'temperature' => $faker->numberBetween(-10, 40),
                    'date'        => $faker->dateTimeBetween('-1 week', '+1 week'),
                ]);
            }
        }
    }
}
