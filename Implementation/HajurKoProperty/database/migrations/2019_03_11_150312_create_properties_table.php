<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('propFor',20);
            $table->string('propDistrict',100);
            $table->string('propLocation',100);
            $table->integer('propSize')->nullable();
            $table->string('suitableFor',60)->nullable();
            $table->float('waterP')->nullable();
            $table->float('electricP')->nullable();
            $table->double('totPrice');
            $table->text('description',255)->nullable();
            $table->string('approval')->default('unapproved');
            $table->string('image')->nullable();

            $table->integer('propType_id')->unsigned();
            $table->foreign('propType_id')->references('id')->on('proptypes');
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
        Schema::dropIfExists('properties');
    }
}
