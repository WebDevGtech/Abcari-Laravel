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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('admin_users');
            $table->unsignedBigInteger('bar_restaurant_id');
            $table->foreign('bar_restaurant_id')->references('id')->on('bar_restaurants');
            // $table->unsignedBigInteger('sub_category_id');
            // $table->foreign('sub_category_id')->references('id')->on('sub_categories');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedBigInteger('variation_type_id')->nullable();
            $table->foreign('variation_type_id')->references('id')->on('variation_types');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands')->nullable();
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('bar_services')->nullable();
            $table->string('name');
            $table->string('arabic_name')->nullable();
            $table->string('slug')->nullable();
            $table->enum('top_picks',['0','1'])->nullable();
            $table->enum('recommendeds',['0','1'])->nullable();
            $table->enum('preferred',['0','1'])->nullable();
            $table->enum('happy_hour',['0','1'])->nullable();
            $table->string('spu_id')->nullable();
            $table->string('sku')->nullable();
            $table->string('brand')->nullable();
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->enum('is_addon',['0','1'])->nullable(1);
         
            $table->integer('price')->nullable();
            $table->double('weight', 30, 10)->nullable();
            $table->unsignedBigInteger('tax_id')->nullable();
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
        Schema::dropIfExists('products');
    }
};
