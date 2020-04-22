<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFmdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fmds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('view_number');
            $table->integer('minutia_cnt');
            $table->integer('finger_position');
            $table->integer('impression_type');
            $table->integer('quality');
            $table->integer('fmd_id')->unsigned()->nullable();
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
        Schema::dropIfExists('fmds');
    }
}
