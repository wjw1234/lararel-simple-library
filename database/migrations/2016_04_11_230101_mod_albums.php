<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModAlbums extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('albums', function (Blueprint $table) {
            $table->integer("order")->nullable()->after('cover_image');
        });
        Schema::table('images', function (Blueprint $table) {
            $table->integer("order")->nullable()->after('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('albums', function (Blueprint $table) {
            $table->dropColumn('order');
        });
        Schema::table('images', function (Blueprint $table) {
            $table->dropColumn('order');
        });
    }
}
