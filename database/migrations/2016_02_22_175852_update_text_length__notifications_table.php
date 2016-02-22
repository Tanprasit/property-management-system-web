<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTextLengthNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('notifications', function(Blueprint $table) {
            $table->mediumText('data')->change();
            $table->string('title');
            $table->string('notes');
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
        Schema::table('notifications',  function(Blueprint $table) {
            $table->string('data')->change();
            $table->dropColumn('title');
            $table->dropColumn('notes');
        });
    }
}
