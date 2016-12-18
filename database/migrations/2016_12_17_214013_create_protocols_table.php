<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProtocolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('protocols', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->index()->foreign('user_id')->references('id')->on('users');
            $table->integer('patrol_id')->unsigned()->index()->foreign('patrol_id')->references('id')->on('patrols');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
