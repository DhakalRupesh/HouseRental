<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_room', function (Blueprint $table) {
            $table->increments('id');

            $table->string('room',50)->nullable();
            $table->integer('noofRoom')->nullable();

            $table->integer('prop_id')->unsigned();
            $table->foreign('prop_id')->references('id')->on('property');
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
        Schema::dropIfExists('_room');
    }
}
