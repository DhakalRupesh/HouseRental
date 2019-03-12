<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('kitchen')->nullable();
            $table->integer('bedRoom')->nullable();
            $table->integer('livingRoom')->nullable();
            $table->integer('tBathroom')->nullable();
            $table->integer('totRooms');

            $table->integer('propID')->unsigned()->nullable();
            $table->foreign('propID')->references('id')->on('properties')->onDelete('cascade');
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
        Schema::dropIfExists('rooms');
    }
}
