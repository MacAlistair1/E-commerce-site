<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned()->index();
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('subcategory_id')->unsigned()->index()->nullable();
            $table->foreign('subcategory_id')->references('id')->on('sub_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->string('detail', 500);
            $table->string('slug');
            $table->string('price');
            $table->string('stock');
            $table->text('description');
            $table->text('tags');
            $table->integer('off')->default('0');
            $table->string('image');
            $table->string('code')->nullable();
            $table->boolean('bestseller')->default(false);
            $table->boolean('popular')->default(false);
            $table->boolean('seasonal')->default(false);
            $table->boolean('topsell')->default(false);
            $table->boolean('highprice')->default(false);
            $table->boolean('featured')->default(false);
            $table->boolean('branding')->default(false);
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
        Schema::dropIfExists('products');
    }
}
