<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Добавляем location (не хватает)
            $table->string('location')->nullable()->after('bio');
            
            // OAuth провайдеры (Facebook, Google)
            $table->string('facebook_id')->nullable()->unique()->after('password');
            $table->string('google_id')->nullable()->unique()->after('facebook_id');
            
            // Общий провайдер
            $table->string('provider')->nullable()->after('google_id')
                ->comment('OAuth provider: facebook, google');
            $table->string('provider_id')->nullable()->after('provider')
                ->comment('OAuth provider user ID');
            
            // Локаль и timezone
            $table->string('locale', 10)->default('en')->after('twitter')
                ->comment('User language');
            $table->string('timezone', 50)->default('UTC')->after('locale')
                ->comment('User timezone');
            
            // Индексы для быстрого поиска
            $table->index('facebook_id');
            $table->index('google_id');
            $table->index(['provider', 'provider_id']);
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Удаляем индексы
            $table->dropIndex(['users_facebook_id_index']);
            $table->dropIndex(['users_google_id_index']);
            $table->dropIndex(['users_provider_provider_id_index']);
            
            // Удаляем колонки
            $table->dropColumn([
                'location',
                'facebook_id',
                'google_id',
                'provider',
                'provider_id',
                'locale',
                'timezone',
            ]);
        });
    }
};