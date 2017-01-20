<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldDisponibilityTable extends Migration
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('field_disponibility');
    }
}
