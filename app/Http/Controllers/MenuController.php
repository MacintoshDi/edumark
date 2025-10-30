<?php

namespace App\Http\Controllers;

use App\Models\Menu;

class MenuController extends Controller
{
    public static function getMenu($slug = 'main-menu')
    {
        return Menu::where('slug', $slug)
            ->where('is_active', true)
            ->with(['items' => function ($query) {
                $query->where('is_active', true)
                    ->whereNull('parent_id')
                    ->orderBy('order')
                    ->with(['children' => function ($q) {
                        $q->where('is_active', true)->orderBy('order');
                    }]);
            }])
            ->first();
    }
}