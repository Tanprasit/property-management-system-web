<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('devices', function(Blueprint $table) {
            $table->increments('id');
            $table->string('model');
            $table->string('manufactorer');
            $table->string('product');
            $table->string('sdk_version');
            $table->string('serial_number')->unqiue();
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
        //
        Schema::drop('devices');
    }
}
