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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('short_desc')->nullable()->default(null);
            $table->string('icon', 2000)->nullable()->default(null);
            $table->string('image', 2000)->nullable()->default(null);
            $table->string('video', 2000)->nullable()->default(null);
            $table->boolean('is_active')->default(true);
            $table->enum('show_as_banner',
                ['none', 'image', 'video', 'slides']  //Slides Comes From Another Table
            )->default('none');
            $table->softDeletes();
            $table->unsignedBigInteger('parent_id')->nullable()->default(null);
            $table->foreign('parent_id')->references('id')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
