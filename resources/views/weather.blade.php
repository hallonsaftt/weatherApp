@extends('layout')


@section('pageTitle')
    Weather
@endsection


@section('homePage')


        @foreach($prognoza as $grad => $temperatura)

            <h2>{{ $grad }} <span><b>{{ $temperatura }}</b> stepena</span></h2>

        @endforeach


@endsection
