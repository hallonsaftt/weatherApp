<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        $amount = $this->command->getOutput()->ask("Koliko korisnika zelite da napravite?", 1);

        $userEmail = $this->command->getOutput()->ask("What is the email of the user?", $faker->email);

        if($userEmail == true){

            die($this->command->getOutput()->error("User email already exists."));
        }

        $password = $this->command->getOutput()->ask("What is the user Password", 123456);



//        $faker = \Faker\Factory::create();

//progress bar
        $this->command->getOutput()->progressStart($amount);

        for($i = 0; $i < $amount; $i++)
        {
            User::create([

                'name' => $faker->name,
                'email' => $userEmail,
                'password' => Hash::make($password),

            ]);

            $this->command->getOutput()->progressAdvance();
        }

        $this->command->getOutput()->progressFinish();
    }
}
