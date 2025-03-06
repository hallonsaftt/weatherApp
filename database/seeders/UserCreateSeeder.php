<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserCreateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = \Faker\Factory::create();

        $user = $this->command->getOutput()->ask("What is your name?", $faker->name);


        $email = $this->command->getOutput()->ask("What is your email?", $faker->email);

        if($email == true)
        {
            $this->command->getOutput()->error("User is already exists.");
            return;
        }

        $password = $this->command->getOutput()->ask("What is your password?", $faker->password);



        User::create([

            'name' => $user,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $this->command->getOutput()->info("User $user, with $email has been created");

    }
}
