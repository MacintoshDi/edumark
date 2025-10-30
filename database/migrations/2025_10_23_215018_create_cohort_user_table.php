<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cohort_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cohort_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('role', ['student', 'teacher', 'assistant'])->default('student');
            $table->date('enrolled_at')->nullable();
            $table->date('completed_at')->nullable();
            $table->integer('progress')->default(0);
            $table->enum('status', ['enrolled', 'active', 'completed', 'dropped'])->default('enrolled');
            $table->timestamps();

            $table->unique(['cohort_id', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cohort_user');
    }
};