<?php

/**
 * DATABASE MIGRATIONS FOR EDUMARK PLATFORM
 * Place these in database/migrations/
 * Run: php artisan migrate
 */

// 1. 2024_01_01_000001_add_user_fields_to_users_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('student'); // student, teacher, admin, alumni
            $table->text('bio')->nullable();
            $table->string('avatar')->nullable();
            $table->json('interests')->nullable();
            $table->json('goals')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('github')->nullable();
            $table->string('twitter')->nullable();
            $table->integer('points')->default(0);
            $table->boolean('is_mentor')->default(false);
            $table->boolean('is_active')->default(true);
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'bio', 'avatar', 'interests', 'goals', 
                'linkedin', 'github', 'twitter', 'points', 'is_mentor', 'is_active']);
        });
    }
};

