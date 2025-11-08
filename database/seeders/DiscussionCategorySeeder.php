<?php

namespace Database\Seeders;

use App\Models\DiscussionCategory;
use Illuminate\Database\Seeder;

class DiscussionCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Questions',
                'slug' => 'questions',
                'description' => 'Ask technical questions and get help from the community',
                'icon' => 'heroicon-o-question-mark-circle',
                'color' => '#3B82F6',
                'sort_order' => 1,
            ],
            [
                'name' => 'Feedback',
                'slug' => 'feedback',
                'description' => 'Share your feedback and suggestions',
                'icon' => 'heroicon-o-chat-bubble-left-right',
                'color' => '#10B981',
                'sort_order' => 2,
            ],
            [
                'name' => 'Guides',
                'slug' => 'guides',
                'description' => 'Share tutorials and how-to guides',
                'icon' => 'heroicon-o-book-open',
                'color' => '#F59E0B',
                'sort_order' => 3,
            ],
            [
                'name' => 'Announcements',
                'slug' => 'announcements',
                'description' => 'Important platform announcements',
                'icon' => 'heroicon-o-megaphone',
                'color' => '#EF4444',
                'sort_order' => 4,
            ],
            [
                'name' => 'General',
                'slug' => 'general',
                'description' => 'General discussions',
                'icon' => 'heroicon-o-chat-bubble-bottom-center-text',
                'color' => '#6B7280',
                'sort_order' => 5,
            ],
        ];

        foreach ($categories as $category) {
            DiscussionCategory::create($category);
        }
    }
}
