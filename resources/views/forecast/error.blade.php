@extends('layout')


@section('pageTitle')
    Error
@endsection


@section('homePage')
    <div class="alert alert-danger">
        <h2>Greška</h2>
        <p>Prognoza za grad {{ $city }} nije pronađena.</p>
        <p>Molimo proverite da li ste uneli ispravan naziv grada.</p>
        <a href="/">< Back</a>
    </div>
@endsection
