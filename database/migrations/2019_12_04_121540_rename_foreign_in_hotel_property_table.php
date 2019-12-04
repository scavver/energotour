<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameForeignInHotelPropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hotel_property', function (Blueprint $table) {
            $table->dropForeign('place_property_property_id_foreign');

            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hotel_property', function (Blueprint $table) {
            $table->dropForeign('hotel_property_property_id_foreign');

            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
        });
    }
}
