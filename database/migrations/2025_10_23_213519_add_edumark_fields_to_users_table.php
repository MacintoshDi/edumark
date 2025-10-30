<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('student')->after('email');
            $table->text('bio')->nullable()->after('role');
            $table->string('avatar')->nullable()->after('bio');
            $table->json('interests')->nullable()->after('avatar');
            $table->json('goals')->nullable()->after('interests');
            $table->string('linkedin')->nullable()->after('goals');
            $table->string('github')->nullable()->after('linkedin');
            $table->string('twitter')->nullable()->after('github');
            $table->integer('points')->default(0)->after('twitter');
            $table->boolean('is_mentor')->default(false)->after('points');
            $table->boolean('is_active')->default(true)->after('is_mentor');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'role', 'bio', 'avatar', 'interests', 'goals',
                'linkedin', 'github', 'twitter', 'points', 'is_mentor', 'is_active'
            ]);
        });
    }
};