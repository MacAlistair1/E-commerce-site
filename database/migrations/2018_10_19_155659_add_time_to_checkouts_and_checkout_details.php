<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimeToCheckoutsAndCheckoutDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('checkouts', function($table) {
            $table->string('time');
        });

        Schema::table('checkout_details', function($table) {
            $table->string('time');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('checkouts', function($table) {
            $table->dropColumn('time');
        });

        Schema::table('checkout_details', function($table) {
            $table->dropColumn('time');
        });
    }
}
