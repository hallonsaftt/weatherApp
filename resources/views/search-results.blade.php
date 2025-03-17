@extends('layout')

@section('pageTitle')
    WeatherApp ❤️
@endsection

@section('homePage')
    <div class="temp-container">
        <div>

            <div>
                @if (session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session()->get('error') }}
                        <a href="/login">Uloguj se</a>
                    </div>
                @endif
            </div>

            @foreach($cities as $city)
                @php
                    $weatherType = optional($city->todaysForecast)->weather_type ?? 'unknown';
                    $icon = \App\Http\ForecastHelper::getIconByWeatherType($weatherType);
                @endphp

                @if(in_array($city->id, $userFavourites))

                    <a class="btn btn-primary mb-5 me-0" href="{{ route('user-cities.favourite', ['city' => $city->id]) }}"> <i class="bi bi-trash"></i>

                    </a>

                    <a href="/forecast/{{ $city->name }}" class="btn btn-primary mb-5 me-3">

                        <i class="{{ $icon }}"></i> {{ $city->name }}

                    </a>

                @else


                    <a class="btn btn-primary mb-5 me-0" href="{{ route('user-cities.favourite', ['city' => $city->id]) }}"> <i class="bi bi-heart"></i> </a>

                    <a href="/forecast/{{ $city->name }}" class="btn btn-primary mb-5 me-3">

                        <i class="{{ $icon }}"></i> {{ $city->name }}

                    </a>


                @endif

            @endforeach







            <br><br><br><br><br><br>
            <a href="/" class="btn btn-cart"> << Back to all</a>
        </div>
    </div>
@endsection
