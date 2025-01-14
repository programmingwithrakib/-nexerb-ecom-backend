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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('variation_attribute_id');
            $table->unsignedBigInteger('variation_option_id');
            $table->double('sell_price')->default(0);
            $table->double('buy_price')->default(0);
            $table->string('sku')->nullable()->default(null);
            $table->double('after_discount_sell_price')->default(0);
            $table->double('discount_amount')->default(0);
            $table->enum('discount_type', ['flat', 'percent'])->nullable()->default(null);
            $table->date('discount_start_date')->nullable()->default(null);
            $table->date('discount_end_date')->nullable()->default(null);
            $table->string('thumbnail', 2000)->nullable();
            $table->string('video', 2000)->nullable();
            $table->enum('video_provider', ['none', 'local', 'youtube', 'vimeo'])->nullable()->default(null);
            $table->integer('stock_quantity')->default(0);
            $table->boolean('in_stock')->default(true);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('variation_attribute_id')->references('id')->on('variation_attributes');
            $table->foreign('variation_option_id')->references('id')->on('variation_options');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
