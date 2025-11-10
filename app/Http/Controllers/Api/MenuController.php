<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function show($slug)
    {
        $menu = Menu::where('slug', $slug)->with('items')->firstOrFail();
        return response()->json($menu);
    }
}
