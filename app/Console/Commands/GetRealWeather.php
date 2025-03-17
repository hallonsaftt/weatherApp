<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetRealWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-real-weather';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command use for sync real weather data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $url = "https://reqres.in/api/users?page=2";

        $response = Http::get($url);

        $jsonresponse = $response->body();

        $jsonresponse = json_decode($jsonresponse, true); //ovo ej sada Array assoc

        dd($jsonresponse['total'], 'Total');

    }
}
