<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetSingleUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-single-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
//        $url = "https://reqres.in/api/users/2";
//
//        $response = Http::get($url);
//
//        $jsonResponse = $response->body();
//
//        $jsonResponse = $response->json();
//
//        dd($jsonResponse);
//
//        $user = $jsonResponse['data'];
//
//        dd($user);

        $response = Http::post('https://reqres.in/api/create', [
            "name" => "John Doe",
            "job" => "programmer",
        ]);

        dd($response->json());


    }
}
