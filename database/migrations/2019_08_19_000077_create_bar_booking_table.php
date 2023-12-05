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
        Schema::create('bar_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bar_booking_type_id')->nullable();
            $table->foreign('bar_booking_type_id')->references('id')->on('bar_booking_types');
            $table->unsignedBigInteger('bar_restaurant_id');
            $table->foreign('bar_restaurant_id')->references('id')->on('bar_restaurants');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('table_no')->nullable();
            $table->integer('no_of_member')->nullable();
            $table->string('stating_time')->nullable();
            $table->integer('end_time')->nullable();
            $table->enum('status',['current','cancel','close'])->nullable();
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
        Schema::dropIfExists('bar_bookings');
    }
};
