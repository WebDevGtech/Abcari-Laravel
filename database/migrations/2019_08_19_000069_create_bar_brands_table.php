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
        Schema::create('bar_brands', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bar_restaurant_id');
            $table->foreign('bar_restaurant_id')->references('id')->on('bar_restaurants');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->enum('status',['0','1'])->default('1');
            $table->enum('is_top_brands',['0','1'])->nullable();
            $table->integer('arrangements')->nullable();
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
        Schema::dropIfExists('bar_brands');
    }
};
