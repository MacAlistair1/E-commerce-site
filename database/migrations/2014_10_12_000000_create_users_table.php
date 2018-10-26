<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('verifytoken')->nullable();
            $table->enum('status', ['0', '1'])->default('0');
            $table->string('password');
            $table->string('contact', 15);
            $table->string('company', 100)->nullable();
            $table->string('address', 100);
            $table->string('city', 100);
            $table->integer('postal', 6)->nullable();
            $table->string('country', 15);
            $table->integer('province', 1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
