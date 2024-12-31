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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id')->nullable()->default(null);
            $table->unsignedBigInteger('category_id')->nullable()->default(null);
            $table->string('name');
            $table->string('slug');
            $table->string('sku')->nullable()->default(null);
            $table->string('unit')->nullable()->default(null);
            $table->integer('min_purchase_quantity')->nullable()->default(null);
            $table->longText('description')->nullable()->default(null);
            $table->string('thumbnail', 2000)->nullable()->default(null);
            $table->string('video', 2000)->nullable()->default(null);
            $table->enum('video_provider', ['local', 'youtube', 'vimeo', 'instagram'])->nullable()->default(null);
            $table->boolean('available_emi')->default(false);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_published')->default(false);
            $table->boolean('in_stock')->default(true);
            $table->softDeletes();
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
