<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jobs_board', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->enum('type', ['full-time', 'part-time', 'contract', 'internship', 'freelance'])->default('full-time');
            $table->string('company')->nullable();
            $table->string('location')->nullable();
            $table->boolean('is_remote')->default(false);
            $table->decimal('salary_min', 10, 2)->nullable();
            $table->decimal('salary_max', 10, 2)->nullable();
            $table->string('salary_currency', 3)->default('USD');
            $table->json('skills_required')->nullable();
            $table->string('application_url')->nullable();
            $table->string('application_email')->nullable();
            $table->date('deadline')->nullable();
            $table->enum('status', ['draft', 'published', 'closed', 'filled'])->default('draft');
            $table->integer('views')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jobs_board');
    }
};