<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCoverIdToLandmarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('landmarks', function (Blueprint $table) {
            $table->unsignedBigInteger('cover_id')->after('category_id')->nullable();

            $table->foreign('cover_id')->references('id')->on('images')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('landmarks', function (Blueprint $table) {
            $table->dropForeign(['cover_id']);

            $table->dropColumn('cover_id');
        });
    }
}
