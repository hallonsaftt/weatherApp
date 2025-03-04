@extends('layout')


@section('pageTitle')
    WeatherApp ❤️
@endsection


@section('homePage')

    <div class="container my-4">
        <h2 class="text-center mb-3 blink">🌤️ <b>WeatherApp</b> better Experience </h2>
        <p class="text-center mb-4">Login to see All features</p>

        @if(auth()->user())


            @foreach($prognoza as $grad => $dnevneTemperature)
                <div class="weather-forecast">
                    <h2 class="weather-city">{{ $grad }}</h2>

                    <a href="/forecast/{{ $grad }}">Pogledaj prognozu</a>
                </div>
                <br>
            @endforeach





        @endif

        <div class="row">


        </div>

    </div>



@endsection


