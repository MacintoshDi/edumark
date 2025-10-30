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
        Schema::table('cohorts', function (Blueprint $table) {
            // Поля для динамического меню
            $table->string('badge')->nullable()->after('description'); // "1", "Pro", "New"
            $table->string('icon')->nullable()->after('badge'); // ключ иконки
            $table->boolean('published')->default(false)->after('status'); // видимость в меню
            $table->unsignedInteger('order')->default(0)->after('published'); // порядок сортировки
            $table->timestamp('starts_at')->nullable()->after('start_date'); // дата старта для сортировки
            
            // Индексы для производительности
            $table->index(['published', 'order']);
            $table->index(['published', 'starts_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cohorts', function (Blueprint $table) {
            $table->dropIndex(['published', 'order']);
            $table->dropIndex(['published', 'starts_at']);
            
            $table->dropColumn(['badge', 'icon', 'published', 'order', 'starts_at']);
        });
    }
};