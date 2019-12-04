<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenamePlacePropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('place_property', 'hotel_property');

        Schema::table('hotel_property', function (Blueprint $table) {
            $table->renameColumn('place_id', 'hotel_id');

            //$table->dropForeign(['place_id', 'property_id']);

            //$table->primary(['hotel_id']);

            //$table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
            //$table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('hotel_property', 'place_property');

        Schema::table('place_property', function (Blueprint $table) {
            $table->renameColumn('hotel_id', 'place_id');

            //$table->dropForeign(['hotel_id', 'property_id']);

            //$table->primary(['place_id']);

            //$table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');
            //$table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
        });
    }
}
