<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Blog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',150);
            $table->string('slug',150);
            
            $table->string('image', 150)->nullable();
            $table->longText('description')->nullable();

            $table->string('meta_title', 200)->nullable();
            $table->string('meta_keywords', 200)->nullable();
            $table->text('meta_description')->nullable();

            $table->boolean('status');

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
        Schema::dropIfExists('blogs');
    }
}
