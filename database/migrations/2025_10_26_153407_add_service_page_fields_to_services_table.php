<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            // Основные поля
            $table->string('h1')->nullable()->after('name'); // H1 заголовок
            $table->text('short_description')->nullable()->after('description'); // Краткое описание
            
            // Медиа
            $table->json('gallery')->nullable(); // Галерея изображений
            $table->string('video_url')->nullable(); // Видео
            
            // Исполнитель
            $table->foreignId('seller_id')->nullable()->constrained('users')->nullOnDelete(); // Продавец
            $table->decimal('rating', 3, 2)->default(0); // Рейтинг (4.5)
            $table->integer('reviews_count')->default(0); // Количество отзывов
            
            // Детали услуги
            $table->integer('delivery_days')->nullable(); // Срок выполнения (дни)
            $table->string('location')->nullable(); // Локация
            $table->string('english_level')->nullable(); // Уровень английского
            
            // Что входит
            $table->json('includes')->nullable(); // Что входит в услугу (массив)
            
            // Технические детали
            $table->json('tech_details')->nullable(); // App type, Design tool, Device
            
            // Пакеты цен
            $table->json('pricing_packages')->nullable(); // Basic, Standard, Premium
            
            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
        });
    }

    public function down(): void
{
    Schema::table('services', function (Blueprint $table) {
        // Сначала удаляем внешний ключ
        $table->dropForeign(['seller_id']);
        
        // Затем удаляем колонки
        $table->dropColumn([
            'h1', 'short_description', 'gallery', 'video_url',
            'seller_id', 'rating', 'reviews_count',
            'delivery_days', 'location', 'english_level',
            'includes', 'tech_details', 'pricing_packages',
            'meta_title', 'meta_description', 'meta_keywords'
        ]);
    });
}
};