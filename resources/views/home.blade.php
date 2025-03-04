@extends('layout')


@section('pageTitle')
    WeatherApp ❤️
@endsection


@section('homePage')

{{--    <div class="container my-4">--}}
{{--        <h2 class="text-center mb-3 blink">🌤️ <b>WeatherApp</b> better Experience </h2>--}}
{{--        @if(!auth()->user())--}}
{{--        <p class="text-center mb-4">Login to see All features</p>--}}
{{--        @endif--}}

{{--        @if(auth()->user())--}}

{{--            <div class="temp-container">--}}
{{--            @foreach($cities as $city)--}}
{{--                <div class="weather-forecast">--}}
{{--                    <h2 class="weather-city">{{ $city->name }}</h2>--}}

{{--                    <a href="/forecast/{{ $city->name }}" class="btn btn-cart">Pogledaj prognozu</a>--}}
{{--                </div>--}}
{{--                <br>--}}
{{--            @endforeach--}}
{{--            </div>--}}




{{--        @endif--}}

{{--        <div class="row">--}}


{{--        </div>--}}

{{--    </div>--}}

<div class="container my-4">
    <h2 class="text-center mb-3 blink">🌤️ <b>WeatherApp</b> better Experience</h2>
    @if(!auth()->user())
        <p class="text-center mb-4">Login to see All features</p>
    @endif

    @if(auth()->user())
        {{-- Svaki red može da ima 3 kolone na md ekranima i većim --}}
        <div class="row">
            @foreach($cities as $city)
                <div class="col-md-4 mb-4">
                    <div class="weather-forecast">
                        <h2 class="weather-city">{{ $city->name }}</h2>
                        <a href="/forecast/{{ $city->name }}" class="btn btn-cart">Pogledaj prognozu</a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>




@endsection


