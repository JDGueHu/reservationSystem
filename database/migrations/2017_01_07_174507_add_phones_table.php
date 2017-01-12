<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone');
            $table->string('owner')->nullable();
            $table->string('owner_id')->nullable();
            $table->boolean('add_tmp')->default(false);

            $table->integer('phone_type_id')->unsigned();
            $table->foreign('phone_type_id')->references('id')->on('phone_types');

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
        Schema::dropIfExists('phones');
    }
}
