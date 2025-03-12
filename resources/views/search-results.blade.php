@extends('layout')

@section('pageTitle')
    WeatherApp ❤️
@endsection

@section('homePage')
    <div class="temp-container">
        <div>

            @foreach($cities as $city)
{{--                {{ dd($city->todayForecasts) }}--}}
                <a href="/forecast/{{ $city->name }}">



                    <span class="bg-blue-100 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-blue-900 dark:text-blue-300">

                        @php
                            $icon = \App\Http\ForecastHelper::getIconByWeatherType($city->todaysForecast?->weather_type);
                        @endphp

                        <i class="{{ $icon }}"> </i>

                        {{ $city->name }}
                </span>


                </a>

            @endforeach


            <br><br><br><br><br><br>
            <a href="/" class="btn btn-cart"> << Back to all</a>
        </div>
    </div>
@endsection
