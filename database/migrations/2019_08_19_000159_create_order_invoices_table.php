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
        Schema::create('order_invoices', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedBigInteger('customer_id');
        $table->foreign('customer_id')->references('id')->on('users');    
        $table->unsignedBigInteger('bar_restaurant_id');
        $table->foreign('bar_restaurant_id')->references('id')->on('bar_restaurants');
        $table->unsignedBigInteger('order_id');
        $table->foreign('order_id')->references('id')->on('orders');  
        $table->integer('grand_total')->nullable();
        // $table->unsignedBigInteger('reward_redeem_point_transaction_id');
        $table->integer('reward_redeem_point_transaction_id')->unsigned();
        $table->foreign('reward_redeem_point_transaction_id')->references('id')->on('reward_redeem_point_transaction');  
        $table->string('order_no')->nullable();
        $table->enum('status',['pending','processing','served','cancelled'])->nullable();

      
        $table->unsignedBigInteger('order_transaction_id');
        $table->foreign('order_transaction_id')->references('id')->on('order_transactions');
        $table->unsignedBigInteger('reward_point_transaction_id')->nullable();
      
        $table->foreign('reward_point_transaction_id')->references('id')->on('reward_point_transactions');
        $table->unsignedBigInteger('redeem_point_transaction_id')->nullable();
        $table->foreign('redeem_point_transaction_id')->references('id')->on('redeem_point_transactions');
        $table->string('invoice_no')->nullable();
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
        Schema::dropIfExists('order_invoices');
    }
};
