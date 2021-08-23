<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('amount');
            $table->dateTime('time_stamp');
            $table->bigInteger('discount_coupon_id');
            $table->bigInteger('remort_transction_id');
            $table->enum('payment_method', ["cash", "Bank"]);
              $table->timestamps();
            $table->softDeletes();
            $table->bigInteger('bookings_id', false, true)->unsigned()->index();
        
            $table->foreign('bookings_id')->references('id')->on('bookings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('payments');
    }
}
