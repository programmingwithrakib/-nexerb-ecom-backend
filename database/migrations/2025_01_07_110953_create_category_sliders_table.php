<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('category_sliders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable()->default(null);
            $table->unsignedBigInteger('home_category_id')->nullable()->default(null);
            $table->string('banner_image_sm', 1500)->nullable()->default(null);
            $table->string('banner_image_md', 1500)->nullable()->default(null);
            $table->string('banner_image_lg', 1500)->nullable()->default(null);
            $table->string('banner_video', 1500)->nullable()->default(null);
            $table->string('banner_title', 2000);
            $table->string('banner_desc', 2000);

            //link url for banner buttons
            $table->string('link_url_1', 2000)->nullable()->default(null);
            $table->string('link_url_2', 2000)->nullable()->default(null);
            $table->string('link_url_3', 2000)->nullable()->default(null);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('home_category_id')->references('id')->on('home_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_sliders');
    }
};
