<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Song title
            $table->text('lyrics'); // Song lyrics
            $table->boolean('public')->default(true); // Public or private
            $table->string('cover_image')->nullable(); // Path to cover image
            $table->foreignId('category_id')->constrained(); // Foreign key to categories table
            $table->foreignId('user_id')->constrained(); // Foreign key to users table
            $table->timestamps(); // Timestamps (created_at, updated_at)
        });
    }

    public function down()
    {
        Schema::dropIfExists('songs');
    }
}
