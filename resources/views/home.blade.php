@extends('layout')


@section('pageTitle')
    WeatherApp ❤️
@endsection


@section('homePage')


<div class="container my-4">
    <h2 class="text-center mb-3 blink">🌤️ <b>WeatherApp</b> better Experience</h2>


    <br>


@if(!auth()->user())
        <p class="text-center mb-4">Login to see All features</p>
    @endif


    @if(auth()->user())

        <div class="container-search">
        <form method="POST" action="">
            @csrf
            <div class="row">


                <div class="col-md-8">
                    <div class="form-group">
                        <input type="text" class="form-control" name="city_search" placeholder="Pretrazi grad">
                    </div>
                </div>


                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-cart">Pretrazi</button>
                </div>
            </div>
            </form>
        </div><br>


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


