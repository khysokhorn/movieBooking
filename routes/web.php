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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('movieApps', App\Http\Controllers\MovieAppController::class);


Route::resource('cnimas', App\Http\Controllers\CnimaController::class);


Route::resource('cities', App\Http\Controllers\CityController::class);


Route::resource('cinemas', App\Http\Controllers\CinemaController::class);


Route::resource('cinemaHalls', App\Http\Controllers\CinemaHallController::class);


Route::resource('cinemaSeats', App\Http\Controllers\Cinema_SeatController::class);


Route::resource('shows', App\Http\Controllers\ShowController::class);


Route::resource('bookings', App\Http\Controllers\BookingController::class);


Route::resource('payments', App\Http\Controllers\PaymentController::class);
