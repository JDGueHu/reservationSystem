<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAvailabilitiesFieldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('availabilities_field', function (Blueprint $table) {
            $table->increments('id');

            $table->timeTz('ini_hour');
            $table->timeTz('fin_hour');

            $table->integer('field_id')->unsigned();
            $table->foreign('field_id')->references('id')->on('fields');

            $table->timestampsTz();
        });

        //relacion muchos a muchos con days
        Schema::create('availability_field_day', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('availability_field_id')->unsigned();
            $table->foreign('availability_field_id')->references('id')->on('availabilities_field');

            $table->integer('day_id')->unsigned();
            $table->foreign('day_id')->references('id')->on('days');

            $table->integer('price_id')->unsigned();
            $table->foreign('price_id')->references('id')->on('prices');

            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('availabilities_field');
    }
}
