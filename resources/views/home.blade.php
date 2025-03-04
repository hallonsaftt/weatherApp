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
                    @foreach($dnevneTemperature as $dan => $temperatura)
                        <div class="weather-day">
                            <div class="d-flex align-items-center">
                                <span class="weather-icon">🌡️</span>
                                <span class="weather-day-name">{{ $dan }}</span>
                            </div>
                            <span class="weather-temperature
                    {{ $temperatura > 25 ? 'temp-hot' :
                       ($temperatura < 15 ? 'temp-cold' : 'temp-mild') }}">
                    {{ $temperatura }}°C
                </span>
                        </div>
                    @endforeach
                </div>
            @endforeach





        @endif

        <div class="row">


        </div>

    </div>



@endsection


