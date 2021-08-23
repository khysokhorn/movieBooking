<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('movie_apps', App\Http\Controllers\API\MovieAppAPIController::class);


Route::resource('cnimas', App\Http\Controllers\API\CnimaAPIController::class);


Route::resource('cities', App\Http\Controllers\API\CityAPIController::class);


Route::resource('cinemas', App\Http\Controllers\API\CinemaAPIController::class);


Route::resource('cinema_halls', App\Http\Controllers\API\CinemaHallAPIController::class);


Route::resource('cinema__seats', App\Http\Controllers\API\Cinema_SeatAPIController::class);


Route::resource('shows', App\Http\Controllers\API\ShowAPIController::class);


Route::resource('bookings', App\Http\Controllers\API\BookingAPIController::class);


Route::resource('payments', App\Http\Controllers\API\PaymentAPIController::class);
