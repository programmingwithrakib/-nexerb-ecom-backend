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
        Schema::create('product_more_details', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('position', ['default', 'top', 'right', 'left', 'bottom'])->default('default');
            $table->longText('description');
            $table->boolean('status')->default(true);
            $table->unsignedBigInteger('product_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_more_details');
    }
};
