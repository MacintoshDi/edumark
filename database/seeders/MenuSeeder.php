<?php
namespace Database\Seeders;
use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Database\Seeder;
class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $mainMenu = Menu::updateOrCreate(
            ['slug' => 'main'],
            [
                'name' => 'Main navigation',
                'location' => 'header',
                'is_active' => true,
            ]
        );
        $mainMenu->allItems()->delete();
        $home = $mainMenu->allItems()->create([
            'type' => 'link',
            'title' => 'Home',
            'slug' => 'home',
            'url' => '/',
            'is_active' => true,
            'position' => 1,
        ]);
        $cohorts = $mainMenu->allItems()->create([
            'type' => 'dropdown',
            'title' => 'Cohorts',
            'slug' => 'cohorts',
            'url' => '/cohorts',
            'is_active' => true,
            'position' => 2,
        ]);
        $mainMenu->allItems()->create([
            'type' => 'button',
            'title' => 'Apply',
            'slug' => 'apply',
            'url' => '/apply',
            'is_active' => true,
            'position' => 3,
            'device_visibility' => ['desktop', 'tablet'],
        ]);
        $cohorts->children()->createMany([
            [
                'type' => 'link',
                'title' => 'Spring Cohort',
                'slug' => 'spring',
                'url' => '/cohorts/spring',
                'is_active' => true,
                'position' => 1,
            ],
            [
                'type' => 'link',
                'title' => 'Summer Cohort',
                'slug' => 'summer',
                'url' => '/cohorts/summer',
                'is_active' => true,
                'position' => 2,
            ],
        ]);
    }
}