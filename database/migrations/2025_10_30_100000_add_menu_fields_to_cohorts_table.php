<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cohorts', function (Blueprint $table) {
            $table->string('badge')->nullable()->after('description');
            $table->string('icon')->nullable()->after('badge');
            $table->boolean('published')->default(false)->after('status');
            $table->unsignedInteger('order')->default(0)->after('published');
            $table->timestamp('starts_at')->nullable()->after('start_date');
            
            $table->index(['published', 'order']);
            $table->index(['published', 'starts_at']);
        });
    }

    public function down(): void
    {
        Schema::table('cohorts', function (Blueprint $table) {
            $table->dropIndex(['published', 'order']);
            $table->dropIndex(['published', 'starts_at']);
            
            $table->dropColumn(['badge', 'icon', 'published', 'order', 'starts_at']);
        });
    }
};