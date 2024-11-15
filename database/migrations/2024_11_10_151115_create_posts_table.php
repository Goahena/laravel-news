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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 150)->nullable();
            $table->string('title', 150)->nullable();
            $table->text('body');
            $table->integer('views');
            $table->integer('likes');
            $table->integer('dislikes');
            $table->foreignId('user_id')->nullable()->index();
            $table->string('status', 150);
            $table->timestamp('published_at')->nullable();
            $table->timestamp('remove_at')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
