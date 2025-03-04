@extends('layout')


@section('pageTitle')
    WeatherApp ❤️
@endsection


@section('homePage')
    <div class="temp-container">
    <div class="weather-forecast">
        <h2 class="weather-city">{{ $city }}</h2>
        @foreach($forecast as $dan => $temperatura)
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
        <a href="/" class="btn btn-cart"> << Back to all</a>
    </div>

    </div>
@endsection
