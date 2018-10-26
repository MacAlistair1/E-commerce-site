<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBannerImgsToOwnerDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('owner_details', function ($table) {
            $table->string('banner1_img');
            $table->string('banner2_img');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('owner_details', function ($table) {
            $table->dropColumn('banner1_img');
            $table->dropColumn('banner2_img');
        });
    }
}
