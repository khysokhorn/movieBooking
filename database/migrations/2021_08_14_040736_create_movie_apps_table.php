<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieAppsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_apps', function (Blueprint $table) {
            $table->id('id');
            $table->string('title', 256);
            $table->string('description', 256);
            $table->dateTime('duration');
            $table->dateTime('releaseDate');
            $table->string('country', 16);
            $table->string('genre', 20);
            $table->timestamps();
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
        Schema::drop('movie_apps');
    }
}
