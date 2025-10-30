<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->command->info("🌱 Запуск сидирования базы данных...\n");

        // Сидеры в порядке зависимостей
        $this->call([
            // Сначала роли и пользователи (если есть)
            // RolesAndPermissionsSeeder::class,
            
            // Затем меню
            MenuSeeder::class,
            
            // Другие сидеры...
        ]);

        $this->command->info("\n✅ Сидирование завершено успешно!");
    }
}
