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
        Schema::create('order_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('order_no');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('bar_restaurant_id');
            $table->foreign('bar_restaurant_id')->references('id')->on('bar_restaurants');
            $table->unsignedBigInteger('payment_gateway_id')->nullable();
            $table->foreign('payment_gateway_id')->references('id')->on('payment_gateways');   
            $table->enum('status', ['pending', 'approved','processing','Cancelled'])->nullable();
            $table->double('total_amount', 50, 2)->nullable();
            $table->double('redeem_points',50,2)->nullable();
            $table->double('redeem_points_amount',50,2)->nullable();
            $table->double('sub_total',50,2)->nullable();
            $table->integer('grand_total')->nullable();
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->double('reward_amount', 50, 2)->nullable();
            $table->double('coupon_discount_amount', 50, 2)->nullable();
            $table->double('offer_discount_amount', 50, 2)->nullable();
            $table->double('reward_points',50,2)->nullable();
            $table->double('reward_points_amount',50,2)->nullable();
            $table->text('request')->nullable();
            $table->text('response')->nullable();
            $table->date('transaction_date')->nullable();
            $table->text('transaction_hash')->nullable();
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('order_transactions');
    }
};
