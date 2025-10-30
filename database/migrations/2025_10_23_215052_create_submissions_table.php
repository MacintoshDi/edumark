<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assignment_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('content')->nullable();
            $table->string('file_path')->nullable();
            $table->integer('points')->nullable();
            $table->text('feedback')->nullable();
            $table->enum('status', ['draft', 'submitted', 'graded', 'returned'])->default('draft');
            $table->dateTime('submitted_at')->nullable();
            $table->dateTime('graded_at')->nullable();
            $table->foreignId('graded_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};