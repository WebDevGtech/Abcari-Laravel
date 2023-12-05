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
        Schema::create('bar_bucket_points', function (Blueprint $table) {
            $table->id();
          
            $table->unsignedBigInteger('bar_bucket_id');
            $table->foreign('bar_bucket_id')->references('id')->on('bar_buckets');
            $table->enum('bucket_point_type',['redeem','reward'])->nullable();
            $table->integer('point')->nullable();
            $table->integer('amount')->nullable();
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
        Schema::dropIfExists('bar_bucket_reward_points');
    }
};
