<?php

namespace Database\Seeders;

use App\Models\WeatherModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserWeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $city = $this->command->getOutput()->ask('What is your city?');

        if ($city == null) {
            die($this->command->getOutput()->error("Your city is missing."));
        } elseif ($city == true)
        {
            die($this->command->getOutput()->error("Your city is already in use."));
        }


        $temperature = $this->command->getOutput()->ask('What is your temperature?');

        if ($temperature == null) {
            die($this->command->getOutput()->error("Your temperature is missing."));
        }


        WeatherModel::create([

            'city' => $city,
            'temp' => $temperature,

        ]);

        $this->command->getOutput()->info("Weather for $city was created!");


    }

}
