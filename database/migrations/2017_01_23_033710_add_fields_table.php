<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->increments('id');

            $table->string('initials')->unique();
            $table->string('name');
            $table->string('details');

            $table->integer('availability_time_id')->unsigned();
            $table->foreign('availability_time_id')->references('id')->on('availability_time');

            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers');

            $table->integer('sport_id')->unsigned();
            $table->foreign('sport_id')->references('id')->on('sports');

            $table->timestamps();
        });

        //relacion muchos a muchos con days
        Schema::create('fields_day', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('field_id')->unsigned();
            $table->foreign('field_id')->references('id')->on('fields');

            $table->integer('day_id')->unsigned();
            $table->foreign('day_id')->references('id')->on('days');

            $table->integer('price_id')->unsigned();
            $table->foreign('price_id')->references('id')->on('prices');

            $table->timeTz('ini_hour');
            $table->timeTz('fin_hour');

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
        Schema::dropIfExists('fields');
    }
}
