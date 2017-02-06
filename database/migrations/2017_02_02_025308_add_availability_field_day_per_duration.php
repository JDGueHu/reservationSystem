<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAvailabilityFieldDayPerDuration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('availabilty_field_day_per_duration', function (Blueprint $table) {
            $table->increments('id');

            $table->timeTz('ini_hour');
            $table->timeTz('fin_hour');

            $table->integer('availability_field_id')->unsigned();
            $table->foreign('availability_field_id')->references('id')->on('availabilities_field');

            $table->integer('field_id')->unsigned();
            $table->foreign('field_id')->references('id')->on('fields');

            $table->integer('day_id')->unsigned();
            $table->foreign('day_id')->references('id')->on('days');

            $table->integer('price_id')->unsigned();
            $table->foreign('price_id')->references('id')->on('prices');


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
        Schema::dropIfExists('availabilty_field_day_per_duration');
    }
}
