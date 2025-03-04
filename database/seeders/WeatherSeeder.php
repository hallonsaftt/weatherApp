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

        foreach ($prognoza as $city => $temp) {
            // Provera
            $existingCity = WeatherModel::where('city', $city)->first();

            if ($existingCity) {
                $this->command->getOutput()->error("Grad {$city} već postoji u bazi.");
                continue;
            }

            // db
            WeatherModel::create([
                'city' => $city,
                'temp' => $temp,
            ]);
        }
    }
}
