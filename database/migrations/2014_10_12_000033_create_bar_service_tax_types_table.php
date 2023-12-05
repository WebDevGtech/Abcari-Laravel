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
        Schema::create('bar_service_tax_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bar_service_id');
            $table->foreign('bar_service_id')->references('id')->on('bar_services');
            $table->unsignedBigInteger('tax_id');
            $table->foreign('tax_id')->references('id')->on('tax_types');
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
        Schema::dropIfExists('bar_service_tax_types');
    }
};
