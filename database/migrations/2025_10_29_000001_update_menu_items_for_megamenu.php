<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Добавляет поля для поддержки mega-menu:
     * - title (string nullable) - основной заголовок пункта меню
     * - devices (json nullable) - массив устройств для отображения
     * - meta (json nullable) - дополнительные метаданные для feature-tile и dynamic-source
     */
    public function up(): void
    {
        if (!Schema::hasTable('menu_items')) {
            throw new \RuntimeException('Table menu_items not found');
        }

        Schema::table('menu_items', function (Blueprint $table) {
            if (!Schema::hasColumn('menu_items', 'title')) {
                $table->string('title')->nullable()->after('parent_id');
            }
            if (!Schema::hasColumn('menu_items', 'devices')) {
                $table->json('devices')->nullable()->after('is_active');
            }
            if (!Schema::hasColumn('menu_items', 'meta')) {
                $table->json('meta')->nullable()->after('devices');
            }
        });

        if (Schema::hasColumn('menu_items', 'label')) {
            // Переносим label -> title только где title пуст
            DB::statement("
                UPDATE menu_items
                SET title = COALESCE(title, label)
                WHERE title IS NULL AND label IS NOT NULL
            ");

            // Пытаемся удалить label (если есть DBAL); в противном случае оставляем как есть
            try {
                Schema::table('menu_items', function (Blueprint $table) {
                    $table->dropColumn('label');
                });
            } catch (\Throwable $e) {
                // no-op
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (!Schema::hasTable('menu_items')) {
            return;
        }

        Schema::table('menu_items', function (Blueprint $table) {
            if (Schema::hasColumn('menu_items', 'meta')) {
                $table->dropColumn('meta');
            }
            if (Schema::hasColumn('menu_items', 'devices')) {
                $table->dropColumn('devices');
            }
            // 'title' не трогаем по ТЗ
        });
    }
};