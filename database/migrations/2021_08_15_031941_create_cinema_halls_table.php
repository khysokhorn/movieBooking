<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCinemaHallsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cinema_halls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 64);
            $table->integer('totalSeat');
            $table->bigInteger('cinema_id', false, true)->unsigned()->index();
            $table->timestamps();
            $table->foreign('cinema_id')->references('id')->on('cinemas')->cascadeOnUpdate()->cascadeOnDelete();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cinema_halls');
    }
}
