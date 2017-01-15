<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identification')->unique();
            $table->string('name');
            $table->string('address');
            $table->string('email');
            $table->string('business_name'); 
            $table->string('domain'); 

            $table->integer('identification_type_id')->unsigned();
            $table->foreign('identification_type_id')->references('id')->on('identification_types');

            $table->integer('zone_id')->unsigned();
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
        Schema::dropIfExists('customers');
    }
}
