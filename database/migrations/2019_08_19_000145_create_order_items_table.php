<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_item', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->string('order_no');
            $table->unsignedBigInteger('bar_restaurant_id');
            $table->foreign('bar_restaurant_id')->references('id')->on('bar_restaurants');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('users');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('bar_category');
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('bar_services');
            $table->integer('tax_price');
            $table->unsignedBigInteger('bar_waiter_detail_id');
            $table->foreign('bar_waiter_detail_id')->references('id')->on('bar_waiter_details');
            $table->unsignedBigInteger('product_variation_id');
            $table->foreign('product_variation_id')->references('id')->on('product_variations');      
            $table->double('price', 50, 2)->nullable();
            $table->double('total_price', 50, 2)->nullable();
            $table->integer('quantity')->nullable();
            $table->enum('is_happy_hours',['0','1'])->nullable();
            $table->unsignedBigInteger('tax_id');
            $table->foreign('tax_id')->references('id')->on('tax_types');
            $table->double('producttaxrate', 50, 2)->nullable();
            $table->text('productdetail')->nullable();
            $table->enum('status',['pending','preparring','ready_to_serve','served','cancelled'])->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('order_item');
    }
};
