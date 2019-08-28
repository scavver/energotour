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
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('place_id');
            $table->unsignedBigInteger('gallery_id')->nullable();
            $table->string('number_of_rooms')->nullable();
            $table->string('category');
            $table->string('view')->nullable();
            $table->integer('number_of_places');
            $table->integer('number_of_extra_places')->nullable();
            $table->integer('area')->nullable();
            $table->string('furniture')->nullable();
            $table->string('equipment')->nullable();
            $table->string('bathroom')->nullable();
            $table->string('service')->nullable();
            $table->timestamps();

            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');
            $table->foreign('gallery_id')->references('id')->on('galleries')->onDelete('cascade');
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
