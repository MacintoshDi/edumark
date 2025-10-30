<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Example HomeController для демонстрации работы мобильной навигации
 * 
 * ВАЖНО: Это упрощенный пример с моковыми данными!
 * В полной версии (после Шага 1.2) данные будут браться из MenuRepository
 */
class HomeController extends Controller
{
    public function index(): View
    {
        // Моковые данные меню для примера (структура как из API)
        // В реальности это придет из MenuRepository->getTree('main', 'header', 'desktop')
        $menuItems = $this->getMockMenuData();

        return view('welcome', [
            'menuItems' => $menuItems
        ]);
    }

    /**
     * Временные моковые данные меню
     * Удалить после реализации MenuRepository (Шаг 1.2)
     */
    private function getMockMenuData(): array
    {
        return [
            // 1. Cohorts (mega menu)
            [
                'id' => 1,
                'title' => 'Cohorts',
                'type' => 'mega',
                'url' => null,
                'target' => '_self',
                'order' => 1,
                'icon' => null,
                'children' => [
                    [
                        'id' => 7,
                        'title' => 'Marketing Fundamentals',
                        'type' => 'feature-tile',
                        'url' => '/cohorts/marketing-fundamentals',
                        'target' => '_self',
                        'order' => 1,
                        'icon' => null,
                        'badge' => '1',
                        'description' => 'Learn the basics of digital marketing and grow your business.',
                        'cta_text' => 'Join',
                    ],
                    [
                        'id' => 8,
                        'title' => 'Advanced SEO',
                        'type' => 'feature-tile',
                        'url' => '/cohorts/advanced-seo',
                        'target' => '_self',
                        'order' => 2,
                        'icon' => null,
                        'badge' => '2',
                        'description' => 'Master search engine optimization techniques.',
                        'cta_text' => 'Join',
                    ],
                    [
                        'id' => 9,
                        'title' => 'Content Strategy',
                        'type' => 'feature-tile',
                        'url' => '/cohorts/content-strategy',
                        'target' => '_self',
                        'order' => 3,
                        'icon' => null,
                        'badge' => '3',
                        'description' => 'Create engaging content that converts.',
                        'cta_text' => 'Join',
                    ],
                    [
                        'id' => 10,
                        'title' => 'Social Media Marketing',
                        'type' => 'feature-tile',
                        'url' => '/cohorts/social-media-marketing',
                        'target' => '_self',
                        'order' => 4,
                        'icon' => null,
                        'badge' => '4',
                        'description' => 'Build your brand on social platforms.',
                        'cta_text' => 'Join',
                    ],
                    [
                        'id' => 11,
                        'title' => 'Browse all cohorts',
                        'type' => 'link',
                        'url' => '/cohorts',
                        'target' => '_self',
                        'order' => 5,
                        'icon' => 'heroicon-o-list-bullet',
                    ],
                ],
            ],
            // 2. Community (mega menu)
            [
                'id' => 2,
                'title' => 'Community',
                'type' => 'mega',
                'url' => null,
                'target' => '_self',
                'order' => 2,
                'icon' => null,
                'children' => [
                    [
                        'id' => 12,
                        'title' => 'Discussions',
                        'type' => 'feature-tile',
                        'url' => '/community/discussions',
                        'target' => '_self',
                        'order' => 1,
                        'icon' => 'heroicon-o-chat-bubble-left-right',
                        'description' => 'Join conversations with fellow learners.',
                        'cta_text' => 'Join',
                    ],
                    [
                        'id' => 13,
                        'title' => 'Events',
                        'type' => 'feature-tile',
                        'url' => '/community/events',
                        'target' => '_self',
                        'order' => 2,
                        'icon' => 'heroicon-o-calendar',
                        'description' => 'Attend workshops, webinars, and meetups.',
                        'cta_text' => 'Join',
                    ],
                    [
                        'id' => 14,
                        'title' => 'Spotlight',
                        'type' => 'feature-tile',
                        'url' => '/community/spotlight',
                        'target' => '_self',
                        'order' => 3,
                        'icon' => 'heroicon-o-star',
                        'description' => 'Celebrate success stories from our community.',
                        'cta_text' => 'Join',
                    ],
                ],
            ],
            // 3. Connect (link)
            [
                'id' => 3,
                'title' => 'Connect',
                'type' => 'link',
                'url' => '/connect',
                'target' => '_self',
                'order' => 3,
                'icon' => null,
            ],
            // 4. Ask Your Teacher (link)
            [
                'id' => 4,
                'title' => 'Ask Your Teacher',
                'type' => 'link',
                'url' => '/ask-your-teacher',
                'target' => '_self',
                'order' => 4,
                'icon' => null,
            ],
            // 5. Search (button)
            [
                'id' => 5,
                'title' => 'Search',
                'type' => 'button',
                'url' => null,
                'target' => '_self',
                'order' => 5,
                'icon' => 'heroicon-o-magnifying-glass',
                'meta' => [
                    'action' => 'open-search',
                    'icon' => 'heroicon-o-magnifying-glass',
                ],
            ],
            // 6. Log in (link)
            [
                'id' => 6,
                'title' => 'Log in',
                'type' => 'link',
                'url' => '/login',
                'target' => '_self',
                'order' => 6,
                'icon' => null,
            ],
        ];
    }
}