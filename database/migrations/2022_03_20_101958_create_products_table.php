<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->integer('price');
            $table->integer('quantity');
            $table->string('image');
            $table->foreignId('store_id')->unsigned();
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->foreignId('manager_id')->unsigned();
            $table->foreign('manager_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreignId('subcategory_id')->unsigned();
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');
            $table->integer('discount_price')->nullable();
            $table->string('weight')->nullable();
            $table->string('brand');
            $table->boolean('status')->default(1);
            $table->boolean('on_sale')->nullable();
            $table->boolean('trending')->nullable();
            $table->boolean('best_seller')->nullable();
            $table->boolean('weekly_deals')->nullable();
            $table->boolean('mid_slider')->nullable();
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
