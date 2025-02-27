<?php

namespace Database\Seeders;

use App\Models\WeatherModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prognoza = [
            "Beograd" => 22,
            "Nis" => 14,
            "Vranje" => 25,
        ];

        foreach ($prognoza as $city => $tep)
        {
                WeatherModel::create([
                        'city' => $city,
                        'temp' => $tep,
                ]);
        }
    }
}
