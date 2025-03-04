@extends('layout')

@section('pageTitle')
    WeatherApp ❤️
@endsection

@section('homePage')
    <div class="temp-container">
        <div class="weather-forecast">
            <h2 class="weather-city">{{ $city }}</h2>

            @foreach($forecasts as $forecast)
                <div class="weather-day">
                    <div class="d-flex align-items-center">
                        <span class="weather-icon">🌡️</span>
                        <!-- U bazi smo sačuvali samo 'date', pa ga prikazujemo -->
                        <span class="weather-day-name">{{ $forecast->date }}</span>
                    </div>

                    <span class="weather-temperature
                        {{ $forecast->temperature > 25 ? 'temp-hot' :
                           ($forecast->temperature < 15 ? 'temp-cold' : 'temp-mild') }}">
                        {{ $forecast->temperature }}°C
                    </span>
                </div>
            @endforeach

            <a href="/" class="btn btn-cart"> << Back to all</a>
        </div>
    </div>
@endsection
