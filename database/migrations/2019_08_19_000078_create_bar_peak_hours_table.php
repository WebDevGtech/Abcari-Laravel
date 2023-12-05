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
        Schema::create('bar_peak_hours', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bar_restaurant_id');
            $table->foreign('bar_restaurant_id')->references('id')->on('bar_restaurants');
            $table->time('stating_time')->nullable();
            $table->time('end_time')->nullable();
            $table->integer('extended_hours')->nullable();
            $table->enum('available_days',['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'])->nullable();
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
        Schema::dropIfExists('bar_peak_hours');
    }
};
