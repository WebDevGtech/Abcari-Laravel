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
        Schema::create('product_variation_stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity')->unsigned();
            $table->unsignedBigInteger('product_variation_id');
            $table->foreign('product_variation_id')->references('id')->on('product_variations');
            $table->unsignedBigInteger('bar_restaurant_id');
            $table->foreign('bar_restaurant_id')->references('id')->on('bar_restaurants');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_variation_stocks');
    }
};
