<?php

use App\Http\Controllers\AdminWeatherController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserCities;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])

    ->name('home');


Route::get('/prognoza', [App\Http\Controllers\WeatherController::class, 'index']);

Route::get('/forecast/search', [App\Http\Controllers\ForecastSearch::class, 'search'])
    ->name('forecast.search');

Route::get('/forecast/{city}', [App\Http\Controllers\ForecastController::class, 'index'])
->name('forecast')  ;

Route::get("/user-cities/favourite/{city}", [UserCities::class, 'favourite'])
->name('user-cities.favourite');





Route::prefix('/admin')->middleware(AdminCheckMiddleware::class)->group(function () {

    Route::view('/weather', 'admin.weather')
        ->name('admin.weather');

    Route::post('/weather/create', [AdminWeatherController::class, 'createWeather'])
        ->name('weather.create');

    Route::post('/weather/update', [AdminWeatherController::class, 'update'])
        ->name('weather.update');

});


require __DIR__.'/auth.php';
