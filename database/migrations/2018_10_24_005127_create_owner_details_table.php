<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnerDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owner_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('logo');
            $table->string('fb_url');
            $table->string('twitter_url');
            $table->string('insta_url');
            $table->string('yt_url');
            $table->string('gplus_url');
            $table->string('email');
            $table->string('contact');
            $table->string('location');
            $table->string('location_url', 600);
            $table->text('about_us');
            $table->string('opening_closing_day');
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
        Schema::dropIfExists('owner_details');
    }
}
