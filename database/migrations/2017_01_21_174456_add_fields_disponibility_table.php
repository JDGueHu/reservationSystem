<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsDisponibilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_disponibility', function (Blueprint $table) {
            $table->increments('id');

            $table->timeTz('hour_ini');
            $table->timeTz('hour_fin');

            $table->integer('field_id')->unsigned();
            $table->foreign('field_id')->references('id')->on('fields');

            $table->integer('availability_time_id')->unsigned();
            $table->foreign('availability_time_id')->references('id')->on('availability_time');

            $table->timestamps();
        });


        //relacion muchos a muchos con días
        Schema::create('field_disponibility_day', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('field_disponibility_id')->unsigned();
            $table->foreign('field_disponibility_id')->references('id')->on('field_disponibility');

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
        Schema::dropIfExists('fields_disponibility');
    }
}
