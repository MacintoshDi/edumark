<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuItem;
use App\Repositories\MenuRepository;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Засеивает меню Edumark (референс 1-в-1)
     */
    public function run(): void
    {
        DB::transaction(function () {
            // Создаём или обновляем меню "main"
            $menu = Menu::updateOrCreate(
                ['slug' => 'main'],
                [
                    'name'      => 'Main Menu',
                    'location'  => 'header',
                    'devices'   => ['desktop', 'tablet', 'mobile'],
                    'is_active' => true,
                ]
            );

            // Удаляем существующие пункты для чистоты (идемпотентность сидера)
            $menu->items()->delete();

            $this->command->info("Создаём меню '{$menu->name}' (slug: {$menu->slug})");

            // ========================================
            // КОРНЕВЫЕ ПУНКТЫ
            // ========================================

            // 1. Cohorts (Mega Menu)
            $cohorts = MenuItem::create([
                'menu_id'   => $menu->id,
                'parent_id' => null,
                'title'     => 'Cohorts',
                'type'      => MenuItem::TYPE_MEGA,
                'url'       => null,
                'order'     => 1,
                'is_active' => true,
            ]);
            $this->command->info("  ✓ Создан корневой пункт: Cohorts (mega)");

            // 2. Community (Mega Menu)
            $community = MenuItem::create([
                'menu_id'   => $menu->id,
                'parent_id' => null,
                'title'     => 'Community',
                'type'      => MenuItem::TYPE_MEGA,
                'url'       => null,
                'order'     => 2,
                'is_active' => true,
            ]);
            $this->command->info("  ✓ Создан корневой пункт: Community (mega)");

            // 3. Connect
            MenuItem::create([
                'menu_id'   => $menu->id,
                'parent_id' => null,
                'title'     => 'Connect',
                'type'      => MenuItem::TYPE_LINK,
                'url'       => '/connect',
                'order'     => 3,
                'is_active' => true,
            ]);
            $this->command->info("  ✓ Создан корневой пункт: Connect");

            // 4. Ask Your Teacher
            MenuItem::create([
                'menu_id'   => $menu->id,
                'parent_id' => null,
                'title'     => 'Ask Your Teacher',
                'type'      => MenuItem::TYPE_LINK,
                'url'       => '/ask-your-teacher',
                'order'     => 4,
                'is_active' => true,
            ]);
            $this->command->info("  ✓ Создан корневой пункт: Ask Your Teacher");

            // 5. Search (Button)
            MenuItem::create([
                'menu_id'   => $menu->id,
                'parent_id' => null,
                'title'     => 'Search',
                'type'      => MenuItem::TYPE_BUTTON,
                'url'       => null,
                'order'     => 5,
                'is_active' => true,
                'meta'      => [
                    'action' => 'open-search',
                    'icon'   => 'heroicon-o-magnifying-glass',
                ],
            ]);
            $this->command->info("  ✓ Создан корневой пункт: Search (button)");

            // 6. Log in
            MenuItem::create([
                'menu_id'   => $menu->id,
                'parent_id' => null,
                'title'     => 'Log in',
                'type'      => MenuItem::TYPE_LINK,
                'url'       => '/login',
                'order'     => 6,
                'is_active' => true,
            ]);
            $this->command->info("  ✓ Создан корневой пункт: Log in");

            // ========================================
            // ДЕТИ COHORTS: 4 карточки + Browse all
            // ========================================

            $cohortTiles = [
                [
                    'title' => 'Marketing Fundamentals',
                    'desc'  => 'Master the basics of digital marketing strategy.',
                    'badge' => '1',
                    'url'   => '/cohorts/marketing-fundamentals',
                    'icon'  => 'heroicon-o-academic-cap',
                    'order' => 1,
                ],
                [
                    'title' => 'Advanced SEO',
                    'desc'  => 'Learn cutting-edge search optimization techniques.',
                    'badge' => '2',
                    'url'   => '/cohorts/advanced-seo',
                    'icon'  => 'heroicon-o-chart-bar',
                    'order' => 2,
                ],
                [
                    'title' => 'Content Strategy',
                    'desc'  => 'Create compelling content that converts.',
                    'badge' => '3',
                    'url'   => '/cohorts/content-strategy',
                    'icon'  => 'heroicon-o-document-text',
                    'order' => 3,
                ],
                [
                    'title' => 'Social Media Marketing',
                    'desc'  => 'Build engaged communities across platforms.',
                    'badge' => '4',
                    'url'   => '/cohorts/social-media',
                    'icon'  => 'heroicon-o-user-group',
                    'order' => 4,
                ],
            ];

            foreach ($cohortTiles as $tile) {
                MenuItem::create([
                    'menu_id'   => $menu->id,
                    'parent_id' => $cohorts->id,
                    'title'     => $tile['title'],
                    'type'      => MenuItem::TYPE_FEATURE_TILE,
                    'url'       => $tile['url'],
                    'order'     => $tile['order'],
                    'is_active' => true,
                    'meta'      => [
                        'description' => $tile['desc'],
                        'badge'       => $tile['badge'],
                        'cta_text'    => 'Join',
                        'icon'        => $tile['icon'],
                    ],
                ]);
            }
            $this->command->info("    ↳ Добавлено 4 feature-tile карточки в Cohorts");

            // Browse all cohorts
            MenuItem::create([
                'menu_id'   => $menu->id,
                'parent_id' => $cohorts->id,
                'title'     => 'Browse all cohorts',
                'type'      => MenuItem::TYPE_LINK,
                'url'       => '/cohorts',
                'order'     => 5,
                'is_active' => true,
                'meta'      => [
                    'icon' => 'heroicon-o-list-bullet',
                ],
            ]);
            $this->command->info("    ↳ Добавлена ссылка: Browse all cohorts");

            // ========================================
            // ДЕТИ COMMUNITY: 3 промо-плитки
            // ========================================

            $communityTiles = [
                [
                    'title' => 'Discussions',
                    'desc'  => 'Ask questions, share insights, and help others grow.',
                    'icon'  => 'heroicon-o-chat-bubble-left-right',
                    'url'   => '/community/discussions',
                    'order' => 1,
                ],
                [
                    'title' => 'Events',
                    'desc'  => 'Join workshops, webinars, and networking sessions.',
                    'icon'  => 'heroicon-o-calendar-days',
                    'url'   => '/community/events',
                    'order' => 2,
                ],
                [
                    'title' => 'Spotlight',
                    'desc'  => 'Celebrate success stories from our community.',
                    'icon'  => 'heroicon-o-star',
                    'url'   => '/community/spotlight',
                    'order' => 3,
                ],
            ];

            foreach ($communityTiles as $tile) {
                MenuItem::create([
                    'menu_id'   => $menu->id,
                    'parent_id' => $community->id,
                    'title'     => $tile['title'],
                    'type'      => MenuItem::TYPE_FEATURE_TILE,
                    'url'       => $tile['url'],
                    'order'     => $tile['order'],
                    'is_active' => true,
                    'meta'      => [
                        'description' => $tile['desc'],
                        'icon'        => $tile['icon'],
                        'cta_text'    => 'Join',
                    ],
                ]);
            }
            $this->command->info("    ↳ Добавлено 3 feature-tile плитки в Community");

            $this->command->info("\n✅ Меню засеяно успешно!");
        });

        // Очищаем кэш меню после сидирования
        $this->command->info("🔄 Очистка кэша меню...");
        try {
            app(MenuRepository::class)->clearCache('main');
            $this->command->info("✅ Кэш очищен!");
        } catch (\Throwable $e) {
            $this->command->warn("⚠️  Не удалось очистить кэш: {$e->getMessage()}");
        }
    }
}