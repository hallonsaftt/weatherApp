@extends('layout')

@section('pageTitle')
    WeatherApp ❤️ (Admin)
@endsection

@section('homePage')
    <div class="container my-4">
        <h2 class="text-center mb-3 blink">Create Weather Forecast</h2>


        @if(!auth()->user())
            <p class="text-center mb-4">Login to see All features</p>
        @elseif(auth()->user())

{{--      {{  <!--akopostoji prikazi poruku--->--}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

{{--        {{<!---hendlovanje errora->--}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- formicsa --}}
        <form method="POST" action="{{ route('weather.create') }}">
            @csrf
            <div class="row">

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="city_id">Grad</label>
                        <select class="form-control" name="city_id" id="city_id">
                            @foreach(\App\Models\City::all() as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="col-md-2">
                    <div class="form-group">
                        <label for="temperature">Temperatura</label>
                        <input type="number" step="0.1" class="form-control" name="temperature" id="temperature" placeholder="npr. 22.5">
                    </div>
                </div>


                <div class="col-md-2">
                    <div class="form-group">
                        <label for="weather_type">Tip Vremena</label>
                        <select class="form-control" name="weather_type" id="weather_type">
                            <option value="sunny">Sunny</option>
                            <option value="rainy">Rainy</option>
                            <option value="snowy">Snowy</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="probability">Verovatnoća (%)</label>
                        <input type="number" class="form-control" name="probability" id="probability" min="1" max="100" placeholder="npr. 80">
                    </div>
                </div>


                <div class="col-md-2">
                    <div class="form-group">
                        <label for="date">Datum</label>
                        <input type="date" class="form-control" name="date" id="date">
                    </div>
                </div>


                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-cart">Kreiraj</button>
                </div>
            </div>
        </form><br>

{{--        Forma za update--}}

            {{-- formicsa --}}
            <form method="POST" action="{{ route('weather.update') }}">
                @csrf
                <div class="row">

                    <div class="col-md-2">
                        <div class="form-group">
                            <select class="form-control" name="city_id" id="city_id">
                                @foreach(\App\Models\City::all() as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="number" step="0.1" class="form-control" name="temperature" id="temperature" placeholder="npr. 22.5">
                        </div>
                    </div>


                    <div class="col-md-2">
                        <div class="form-group">
                            <select class="form-control" name="weather_type" id="weather_type">
                                <option value="sunny">Sunny</option>
                                <option value="rainy">Rainy</option>
                                <option value="snowy">Snowy</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="number" class="form-control" name="probability" id="probability" min="1" max="100" placeholder="npr. 80">
                        </div>
                    </div>


                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="date" class="form-control" name="date" id="date">
                        </div>
                    </div>


                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-cart">Azuriraj</button>
                    </div>
                </div>
            </form>

        <hr>

        <h3 class="mt-4">Progrnoze</h3>
        <div class="row">
            @foreach(\App\Models\Forecast::orderBy('id', 'desc')->get() as $forecast)
                <div class="col-md-4 mb-3">
                    <div class="border p-2">
                        <p><strong>Grad:</strong> {{ $forecast->city->name }}</p>
                        <p><strong>Temperatura:</strong> {{ $forecast->temperature }} °C</p>
                        <p><strong>Tip:</strong> {{ $forecast->weather_type }}</p>
                        <p><strong>Verovatnoća:</strong> {{ $forecast->probability }}%</p>
                        <p><strong>Datum:</strong> <span class="text-success">{{ $forecast->date }}</span></p>
                    </div>
                </div>
            @endforeach
        </div>
        @endif
    </div>
@endsection
