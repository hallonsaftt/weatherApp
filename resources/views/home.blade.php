@extends('layout')


@section('pageTitle')
    WeatherApp ❤️
@endsection


@section('homePage')

    <div class="container my-4">
        <h2 class="text-center mb-3 blink">🌤️ <b>WeatherApp</b> better Experience </h2>
        <p class="text-center mb-4">Login to see All features</p>

        @if(auth()->user())

            <div class="temp-container">
            @foreach($prognoza as $grad => $dnevneTemperature)
                <div class="weather-forecast">
                    <h2 class="weather-city">{{ $grad }}</h2>

                    <a href="/forecast/{{ $grad }}" class="btn btn-cart">Pogledaj prognozu</a>
                </div>
                <br>
            @endforeach
            </div>




        @endif

        <div class="row">


        </div>

    </div>



@endsection


