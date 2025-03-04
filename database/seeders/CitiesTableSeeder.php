<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitiesTableSeeder extends Seeder
{
    public function run()
    {
        $cities = [
            'Beograd', 'Novi Sad', 'Niš', 'Kragujevac', 'Subotica',
            'Zrenjanin', 'Pančevo', 'Kraljevo', 'Užice', 'Čačak',
            'Smederevo', 'Valjevo', 'Kruševac', 'Šabac', 'Sombor',
            'Požarevac', 'Leskovac', 'Loznica', 'Bor', 'Vranje',
        ];

        foreach ($cities as $cityName) {
            City::create(['name' => $cityName]);
        }
    }
}
