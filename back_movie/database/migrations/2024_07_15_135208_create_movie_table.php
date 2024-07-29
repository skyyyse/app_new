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
        Schema::create('movie', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('movie_title')->nullable();
            $table->string('movie_subtitle')->nullable();
            $table->string('movie_description')->nullable();
            $table->integer('movie_active')->nullable();
            $table->string('movie_image')->nullable();
            $table->string('movie_mp4')->nullable();
            $table->integer('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
            $table->integer('create_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie');
    }
};
