<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property', function (Blueprint $table) {
            $table->increments('id');
            $table->string('propFor',20);
            $table->string('propDistrict',100);
            $table->string('propCity',100);
            $table->string('propLocation',100);
            $table->string('mapLocation',150);
            $table->integer('propFloor')->nullable();
            $table->integer('propSize');
            $table->string('suitableFor',60)->nullable();
            $table->string('preferedPeople',60)->nullable();
            $table->float('priceForProperty',20);
            $table->string('notesForProp',250)->nullable();

            // to be completedconfusion in datatype of float
            $table->integer('propType_id')->unsigned();
            $table->foreign('propType_id')->references('id')->on('proptype');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            
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
        Schema::dropIfExists('property');
    }
}
