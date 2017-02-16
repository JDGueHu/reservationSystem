<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_booking', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('availability_id')->unsigned()->nullable();
            $table->foreign('availability_id')->references('id')->on('availabilities');

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->string("identificador")->unique();

            $table->integer('booking_state_id')->unsigned()->nullable();
            $table->foreign('booking_state_id')->references('id')->on('booking_status');       

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_booking');
    }
}
