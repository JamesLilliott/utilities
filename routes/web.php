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
    return redirect('login');
});

//Auth
Route::get('login', [\App\Http\Controllers\Auth\SessionController::class, 'show'])->name('login');
Route::post('login', [\App\Http\Controllers\Auth\SessionController::class, 'authenticate']);
Route::get('logout', [\App\Http\Controllers\Auth\SessionController::class, 'logout']);
Route::get('register', [\App\Http\Controllers\Auth\RegisterController::class, 'create']);
Route::post('register', [\App\Http\Controllers\Auth\RegisterController::class, 'store']);

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    //Forecast
    Route::resource('/forecast', \App\Http\Controllers\ForecastController::class)->except(['update', 'destroy']);
    Route::get('/forecast/{id}/{date}', [\App\Http\Controllers\ForecastController::class, 'showWithDate']);

    //App of Holding
    Route::prefix('app-of-holding')->group(function () {
        Route::resource('/character', \App\Http\Controllers\AppOfHolding\CharacterController::class);
    });
});
