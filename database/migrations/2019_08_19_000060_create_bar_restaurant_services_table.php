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
        Schema::create('bar_restaurant_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bar_restaurant_id');
            $table->foreign('bar_restaurant_id')->references('id')->on('bar_restaurants');
            $table->unsignedBigInteger('bar_service_id');
            $table->foreign('bar_service_id')->references('id')->on('bar_services');
            $table->enum('status',['0','1'])->default('1');
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
        Schema::dropIfExists('bar_restaurant_services');
    }
};
