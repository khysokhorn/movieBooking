<?php

namespace App\Providers;
use App\Models\Booking;
use App\Models\Show;
use App\Models\User;
use App\Models\MovieApp;
use App\Models\CinemaHall;

use App\Models\Cinema;
use App\Models\City;

use Illuminate\Support\ServiceProvider;
use View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['payments.fields'], function ($view) {
            $bookingItems = Booking::pluck('id','users_id','time_stamp')->toArray();
            $view->with('bookingItems', $bookingItems);
        });
        View::composer(['bookings.fields'], function ($view) {
            $showItems = Show::pluck('id','date')->toArray();
            $view->with('showItems', $showItems);
        });
        View::composer(['bookings.fields'], function ($view) {
            $userItems = User::pluck('email','name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['bookings.fields'], function ($view) {
            $userItems = User::pluck('email','name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['bookings.fields'], function ($view) {
            $userItems = User::pluck('email','name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['shows.fields'], function ($view) {
            $movie_appItems = MovieApp::pluck('title','id')->toArray();
            $view->with('movie_appItems', $movie_appItems);
        });
        View::composer(['shows.fields'], function ($view) {
            $cinema_hallItems = CinemaHall::pluck('name','id')->toArray();
            $view->with('cinema_hallItems', $cinema_hallItems);
        });
        View::composer(['cinema_seats.fields'], function ($view) {
            $cinema_hallItems = CinemaHall::pluck('name','id')->toArray();
            $view->with('cinema_hallItems', $cinema_hallItems);
        });
        View::composer(['cinema_halls.fields'], function ($view) {
            $cinemaItems = Cinema::pluck('name', 'id')->toArray();
            $view->with('cinemaItems', $cinemaItems);
        });

        View::composer(['cinemas.fields'], function ($view) {
            $cityItems = City::pluck('name', 'id')->toArray();
            $view->with('cityItems', $cityItems);
        });
        //
    }
}
