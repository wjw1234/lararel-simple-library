<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFaxAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('site_settings', function ($table) {
            $table->text('fax')->after('email')->nullable();
            $table->text('address')->after('email')->nullable();
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
            $table->dropColumn('fax');
            $table->dropColumn('address');
        });
    }
}
