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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            
            // Basic authentication fields
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            
            // Extended profile fields (from TZ)
            $table->string('avatar')->nullable()->comment('Path to avatar image');
            $table->text('bio')->nullable()->comment('User biography/description');
            $table->string('location')->nullable()->comment('User location (city, country)');
            $table->string('phone', 50)->nullable()->comment('Contact phone number');
            
            // Role and permissions
            $table->enum('role', ['admin', 'teacher', 'student', 'moderator'])
                ->default('student')
                ->index()
                ->comment('User role in the system');
            
            // Cohort relationship
            $table->foreignId('cohort_id')
                ->nullable()
                ->constrained('cohorts')
                ->nullOnDelete()
                ->comment('Primary cohort for the user');
            
            // Status and activity
            $table->boolean('is_active')->default(true)->index()->comment('User account active status');
            $table->timestamp('last_login_at')->nullable()->comment('Last login timestamp');
            
            // Social links (JSON)
            $table->json('social_links')->nullable()->comment('Social media links: LinkedIn, Twitter, GitHub, etc.');
            
            // Laravel defaults
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            
            // Indexes for performance
            $table->index('created_at');
            $table->index(['role', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};