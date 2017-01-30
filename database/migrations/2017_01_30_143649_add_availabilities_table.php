<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAvailabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('availabilities', function (Blueprint $table) {
            $table->increments('id');

            $table->date('date');
            $table->string('ini_hour');
            $table->date('fin_hour');

            $table->integer('field_id')->unsigned();
            $table->foreign('field_id')->references('id')->on('fields');

            $table->integer('availability_status_id')->unsigned();
            $table->foreign('availability_status_id')->references('id')->on('availability_status');

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
        Schema::dropIfExists('availabilities');
    }
}
