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
            Schema::create('postcodes', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('city_id')->unsigned()->index();
                $table->foreign('city_id')->references('id')->on('cities');
                $table->integer('country_id')->unsigned()->index();
                $table->foreign('country_id')->references('id')->on('countries');
                $table->integer('zone_id')->unsigned()->index();
                $table->foreign('zone_id')->references('id')->on('zones');
                $table->string('code')->nullable();
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
        Schema::dropIfExists('postcodes');
    }
};
