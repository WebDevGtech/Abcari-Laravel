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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_no');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');    
            $table->unsignedBigInteger('bar_booking_type_id')->nullable();
            $table->foreign('bar_booking_type_id')->references('id')->on('bar_booking_types');
            $table->unsignedBigInteger('bar_waiter_detail_id')->nullable();
            $table->foreign('bar_waiter_detail_id')->references('id')->on('bar_waiter_details');
            $table->unsignedBigInteger('bar_restaurant_id');
            $table->foreign('bar_restaurant_id')->references('id')->on('bar_restaurants');
            $table->unsignedBigInteger('status');
            $table->unsignedBigInteger('bar_booking_id')->nullable();
            $table->foreign('bar_booking_id')->references('id')->on('bar_bookings');
            $table->integer('tip_amount')->nullable();
            $table->double('grand_total')->nullable();
            $table->integer('sub_total')->nullable();
            $table->unsignedBigInteger('coupon_id');
            $table->foreign('coupon_id')->references('id')->on('bar_coupons');   
            $table->string('coupon_code')->nullable();
            $table->double('coupon_amount')->nullable();
            $table->unsignedBigInteger('payment_method_id')->unsigned()->index();
            $table->foreign('payment_method_id')->references('id')->on('payment_gateways');
            $table->integer('is_current')->default(0);

            // $table->unsignedBigInteger('coupon_id');
            // $table->foreign('status')->references('id')->on('order_status');
           
           
           
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
        Schema::dropIfExists('orders');
    }
};
