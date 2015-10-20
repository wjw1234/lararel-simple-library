<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSocialSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('site_settings', function ($table) {
            $table->text('instagram')->after('email')->nullable();
            $table->text('tumblr')->after('email')->nullable();
            $table->text('site_title')->after('email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_settings', function(Blueprint $table)
        {
            $table->dropColumn('instagram');
            $table->dropColumn('tumblr');
            $table->dropColumn('site_title');
        });
    }
}
