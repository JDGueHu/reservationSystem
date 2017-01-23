<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAvailabilityFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('availability_fields', function (Blueprint $table) {
            $table->increments('id');

            $table->timeTz('ini_hour');
            $table->timeTz('fin_hour');

            $table->integer('field_id')->unsigned();
            $table->foreign('field_id')->references('id')->on('fields');

            $table->integer('price_id')->unsigned();
            $table->foreign('price_id')->references('id')->on('prices');

            $table->integer('day_id')->unsigned();
            $table->foreign('day_id')->references('id')->on('days');

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
        Schema::dropIfExists('availability_fields');
    }
}
