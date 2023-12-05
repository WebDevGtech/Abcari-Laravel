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
        Schema::create('buddy_group_members', function (Blueprint $table) {
            $table->id();
           
            $table->unsignedBigInteger('buddy_group_id');
            $table->foreign('buddy_group_id')->references('id')->on('buddy_groups');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('buddy_id');
            $table->foreign('buddy_id')->references('id')->on('buddy_list');
          
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
        Schema::dropIfExists('buddy_group_members');
    }
};
