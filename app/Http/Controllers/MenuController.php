<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Repositories\MenuRepository;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function show($slug, $location, MenuRepository $menus)
    {
        $device = request()->header('X-Device', 'desktop');
        $menu = $menus->getTree($slug, $location, $device);
        
        return response()->json($menu);
    }
}
