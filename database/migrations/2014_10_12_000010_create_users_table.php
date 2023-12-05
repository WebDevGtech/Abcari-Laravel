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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_group_id')->nullable();
            $table->foreign('user_group_id')->references('id')->on('user_groups');
            $table->unsignedBigInteger('language_id')->nullable();
            $table->foreign('language_id')->references('id')->on('languages');
            $table->string('name')->nullable();
            $table->string('mobile_number');
            $table->string('user_unique_id');
            $table->string('refresh_token')->nullable();
            $table->integer('otp')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('registration_date')->nullable();
            $table->enum('online_status',['online','offline','squeeze'])->nullable();
            $table->double('reward_point_spent', 30, 10)->nullable()->default(0);
            $table->double('reward_point_earning', 30, 10)->nullable()->default(0);
            $table->double('reward_point_remaining', 30, 10)->nullable()->default(0);
            $table->string('device')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latidtude')->nullable();
            $table->string('reward_point_shared')->nullable();
            $table->string('reward_point_received')->nullable();
            $table->date('going_date')->nullable();
            $table->string('fcm_token')->nullable();
            $table->string('app_version')->nullable();
            $table->enum('app_os_format',["ANDROID","IOS","WEBSITE"])->nullable();
            $table->enum('status',['0','1'])->default('1');
            $table->rememberToken()->nullable();
            $table->integer('isbooked')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamp('first_otp_verified_at')->nullable();
            $table->timestamp('last_otp_verified_at')->nullable();
            $table->integer('expired_reward_points')->nullable();
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
        Schema::dropIfExists('users');
    }
};
