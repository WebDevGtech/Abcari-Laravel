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
        Schema::create('bar_restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('arabic_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('admin_users');
            $table->unsignedBigInteger('bar_tie_up_id');
            $table->foreign('bar_tie_up_id')->references('id')->on('bar_tie_up');
            $table->unsignedBigInteger('bar_bucket_id');
            $table->foreign('bar_bucket_id')->references('id')->on('bar_buckets');
            // $table->unsignedBigInteger('bar_service_id');
            // $table->foreign('bar_service_id')->references('id')->on('bar_services');
            // $table->unsignedBigInteger('bar_category_id');
            // $table->foreign('bar_category_id')->references('id')->on('bar_category');
            // $table->unsignedBigInteger('bar_bucket_reward_point_id');
            // $table->foreign('bar_bucket_reward_point_id')->references('id')->on('bar_bucket_points');
            // $table->unsignedBigInteger('bar_bucket_redeem_point_id');
            // $table->foreign('bar_bucket_redeem_point_id')->references('id')->on('bar_bucket_points');
            $table->integer('zone_id')->unsigned()->index();
            $table->foreign('zone_id')->references('id')->on('zones');
            $table->integer('city_id')->unsigned()->index();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->integer('post_code_id')->unsigned()->index();
            $table->foreign('post_code_id')->references('id')->on('postcodes');
            $table->enum('top_picks',['0','1'])->nullable();
            $table->enum('recommendeds',['0','1'])->nullable();
            $table->enum('preferred',['0','1'])->nullable();
            $table->enum('status',['0','1'])->default('1');
            $table->string('about')->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->string('arabic_about')->nullable();
            $table->time('opening_hour')->nullable();
            $table->time('closing_hour')->nullable();
            $table->time('peak_hour')->nullable();
            $table->string('image')->nullable();
            $table->string('banner_image_1')->nullable();
            $table->string('banner_image_2')->nullable();
            $table->string('banner_image_3')->nullable();
            $table->string('description')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('address')->nullable();
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
        Schema::dropIfExists('bar_restaurants');
    }
};
