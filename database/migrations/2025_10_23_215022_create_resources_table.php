<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cohort_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('type', ['file', 'link', 'video', 'document'])->default('file');
            $table->string('file_path')->nullable();
            $table->string('url')->nullable();
            $table->integer('size')->nullable();
            $table->string('mime_type')->nullable();
            $table->integer('downloads')->default(0);
            $table->integer('order')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resources');
    }
};