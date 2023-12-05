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
        Schema::create('bar_coupons', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('coupon_code')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('bar_restaurant_id');
            $table->foreign('bar_restaurant_id')->references('id')->on('bar_restaurants');
            $table->double('discount')->nullable();
            $table->double('minimum_amount')->nullable();
            $table->double('maximum_discount_amount')->nullable();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->foreign('admin_id')->references('id')->on('admin_users')->nullable();
            $table->enum('coupon_type',['bar_admin','country_admin','super_admin'])->nullable();
            $table->enum('discount_type',['flat','percentage'])->nullable();
            $table->enum('status',['0','1'])->default('1');
         
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
        Schema::dropIfExists('bar_coupons');
    }
};
