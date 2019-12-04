<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenamePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('places', 'hotels');

        Schema::table('about', function (Blueprint $table) {
            $table->dropForeign(['place_id']);
            $table->renameColumn('place_id', 'hotel_id');
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
        });

        Schema::table('discounts', function (Blueprint $table) {
            $table->dropForeign(['place_id']);
            $table->renameColumn('place_id', 'hotel_id');
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
        });

        Schema::table('food', function (Blueprint $table) {
            $table->dropForeign(['place_id']);
            $table->renameColumn('place_id', 'hotel_id');
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
        });

        Schema::table('galleries', function (Blueprint $table) {
            $table->dropForeign(['place_id']);
            $table->renameColumn('place_id', 'hotel_id');
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
        });

        Schema::table('infrastructure', function (Blueprint $table) {
            $table->dropForeign(['place_id']);
            $table->renameColumn('place_id', 'hotel_id');
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
        });

        Schema::table('prices', function (Blueprint $table) {
            $table->dropForeign(['place_id']);
            $table->renameColumn('place_id', 'hotel_id');
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
        });

        Schema::table('rooms', function (Blueprint $table) {
            $table->dropForeign(['place_id']);
            $table->renameColumn('place_id', 'hotel_id');
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
        });

        Schema::table('treatment', function (Blueprint $table) {
            $table->dropForeign(['place_id']);
            $table->renameColumn('place_id', 'hotel_id');
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('hotels', 'places');

        Schema::table('about', function (Blueprint $table) {
            $table->dropForeign(['hotel_id']);
            $table->renameColumn('hotel_id', 'place_id');
            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');
        });

        Schema::table('discounts', function (Blueprint $table) {
            $table->dropForeign(['hotel_id']);
            $table->renameColumn('hotel_id', 'place_id');
            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');
        });

        Schema::table('food', function (Blueprint $table) {
            $table->dropForeign(['hotel_id']);
            $table->renameColumn('hotel_id', 'place_id');
            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');
        });

        Schema::table('galleries', function (Blueprint $table) {
            $table->dropForeign(['hotel_id']);
            $table->renameColumn('hotel_id', 'place_id');
            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');
        });

        Schema::table('infrastructure', function (Blueprint $table) {
            $table->dropForeign(['hotel_id']);
            $table->renameColumn('hotel_id', 'place_id');
            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');
        });

        Schema::table('prices', function (Blueprint $table) {
            $table->dropForeign(['hotel_id']);
            $table->renameColumn('hotel_id', 'place_id');
            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');
        });

        Schema::table('rooms', function (Blueprint $table) {
            $table->dropForeign(['hotel_id']);
            $table->renameColumn('hotel_id', 'place_id');
            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');
        });

        Schema::table('treatment', function (Blueprint $table) {
            $table->dropForeign(['hotel_id']);
            $table->renameColumn('hotel_id', 'place_id');
            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');
        });
    }
}
