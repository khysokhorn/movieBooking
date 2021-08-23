<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCinemaSeatsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cinema_seats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('seatNumber');
            $table->enum('type', ["Regular", "Premium"]);
            $table->bigInteger('cinema_halls_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('cinema_halls_id')->references('id')->on('cinema_halls');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cinema__seats');
    }
}
