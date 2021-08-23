<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shows', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('date');
            $table->dateTime('start_time');
            $table->dateTime('endTime');
            $table->bigInteger('cinema_halls_id')->unsigned();
            $table->bigInteger('movie_apps_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('cinema_halls_id')->references('id')->on('cinema_halls');
            $table->foreign('movie_apps_id')->references('id')->on('movie_apps');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shows');
    }
}
