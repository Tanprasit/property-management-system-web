<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateDeviceWithLatLong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('devices' , function (Blueprint $table) {
            $table->decimal('longitude', 10, 7);
            $table->decimal('latitude', 10, 7);
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
        Schema::table('devices', function(Blueprint $table  ) {
            $table->dropColumn('longitude');
            $table->dropColumn('latitude');
        });
    }
}
