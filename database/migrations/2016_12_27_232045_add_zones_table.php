<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddZonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('initials')->unique();

            $table->integer('zone_type_id')->unsigned();
            $table->foreign('zone_type_id')->references('id')->on('zone_types');

            $table->integer('zone_id')->nullable()->unsigned();
            $table->foreign('zone_id')->references('id')->on('zones');


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
        Schema::dropIfExists('zones');
    }
}
