<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Auth
Route::get('login', [\App\Http\Controllers\AuthController::class, 'show'])->name('login');
Route::post('login', [\App\Http\Controllers\AuthController::class, 'authenticate']);
Route::get('logout', [\App\Http\Controllers\AuthController::class, 'logout']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    //Forecast
    Route::resource('/forecast', \App\Http\Controllers\ForecastController::class)->except(['update', 'destroy']);
    Route::get('/forecast/{id}/{date}', [\App\Http\Controllers\ForecastController::class, 'showWithDate']);
});
