@extends('layout')

@section('pageTitle')
    WeatherApp ❤️
@endsection

@section('homePage')
    <div class="temp-container">
        <form>
            <input type="text" name="temperature" placeholder="Unesi temperaturu">
            <select name="city_id">
                @foreach(\App\Models\City::all() as $city)

                    <option value="{{ $city->id }}">{{ $city->name }}</option>

                @endforeach
            </select>
            <button>Next</button>
        </form>
    </div>

    <div>
        @foreach(\App\Models\Forecast::all() as $weather)

            <p>{{ $weather->city->name }}  -  {{ $weather->temperature }}</p>
        @endforeach
    </div>
@endsection
