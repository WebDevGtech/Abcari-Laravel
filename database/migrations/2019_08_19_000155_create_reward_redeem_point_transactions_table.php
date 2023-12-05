<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('reward_redeem_point_transaction', function (Blueprint $table) {
        $table->increments('id');
        $table->string('order_no')->nullable();
        $table->unsignedBigInteger('user_id');
        $table->foreign('user_id')->references('id')->on('users');    
        $table->unsignedBigInteger('bar_restaurant_id');
        $table->foreign('bar_restaurant_id')->references('id')->on('bar_restaurants');
        $table->unsignedBigInteger('transaction_id');
        $table->foreign('transaction_id')->references('id')->on('order_transactions');
        $table->double('reward_points',50,2)->nullable();
        $table->double('redeem_points',50,2)->nullable();
        $table->text('comment')->nullable();
        $table->unsignedBigInteger('order_id');
        $table->foreign('order_id')->references('id')->on('orders');  
        $table->double('rewards_points_amount',50,2)->nullable();
        $table->double('redeem_points_amount',50,2)->nullable();
        $table->enum('status',['pending','processing','served','cancelled'])->nullable();

       
        // $table->integer('reward_point_transaction_id')->unsigned()->index();
        $table->unsignedBigInteger('reward_point_transaction_id')->nullable();
        $table->integer('grand_total')->nullable();
        $table->foreign('reward_point_transaction_id','rpt_id_foreign')->references('id')->on('reward_point_transactions');
        $table->unsignedBigInteger('redeem_point_transaction_id')->nullable();
        $table->foreign('redeem_point_transaction_id','reedeempt_id_foreign')->references('id')->on('redeem_point_transactions');
        $table->string('invoice_no')->nullable();
       
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
        Schema::dropIfExists('reward_redeem_point_transaction');
    }
};
