<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('spotlights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('content');
            $table->string('featured_image')->nullable();
            $table->enum('type', ['success_story', 'highlight', 'achievement', 'news'])->default('highlight');
            $table->boolean('is_published')->default(false);
            $table->dateTime('published_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('spotlights');
    }
};