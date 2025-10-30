<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\MenuRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * API контроллер для работы с меню
 */
class MenuController extends Controller
{
    /**
     * @var MenuRepository
     */
    protected $menuRepository;

    /**
     * MenuController constructor.
     *
     * @param MenuRepository $menuRepository
     */
    public function __construct(MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    /**
     * Получить меню по slug
     *
     * GET /api/menus/{slug}?location=header&device=desktop
     *
     * @param Request $request
     * @param string $slug
     * @return JsonResponse
     */
    public function show(Request $request, string $slug): JsonResponse
    {
        $location = $request->query('location');
        $device = $request->query('device', 'desktop');

        // Валидация device
        if (!in_array($device, ['desktop', 'tablet', 'mobile'])) {
            return response()->json([
                'error' => 'Invalid device parameter',
                'message' => 'Device must be one of: desktop, tablet, mobile'
            ], 400);
        }

        // Получаем меню из репозитория
        $menu = $this->menuRepository->getTree($slug, $location, $device);

        if (!$menu) {
            return response()->json([
                'error' => 'Menu not found',
                'message' => "Menu with slug '{$slug}'" . ($location ? " and location '{$location}'" : '') . " not found or not active"
            ], 404);
        }

        return response()->json($menu);
    }
}