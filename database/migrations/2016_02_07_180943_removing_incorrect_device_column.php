<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemovingIncorrectDeviceColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('devices', function(Blueprint $table) {
            $table->dropColumn('deviceable_id');
            $table->dropColumn('deviceable_type');
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
        Schema::table('devices',  function($table) {
          $table->integer('deviceable_id');
          $table->string('deviceable_type');
        });
    }
}
