<?php

namespace App\Http\Controllers;

use App\Models\Cohort;
use App\Models\User;
use App\Models\Discussion;
use App\Models\Event;
use App\Repositories\MenuRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * HomeController - главная страница и публичные views
 * 
 * Использует MenuRepository для загрузки меню
 * Загружает featured cohorts для главной страницы
 */
class HomeController extends Controller
{
    protected MenuRepository $menuRepository;

    public function __construct(MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    /**
     * Главная страница (для гостей и авторизованных пользователей)
     * 
     * @return View
     */
    public function index(): View
    {
        // Получаем меню из репозитория
        $menuData = $this->menuRepository->getTree(
    slug: 'main',
    location: 'header',
    device: $this->detectDevice()
);

// Извлекаем только массив items
$menuItems = $menuData['items'] ?? [];

        // Загружаем featured cohorts (первые 4 опубликованных с badge)
        $featuredCohorts = Cohort::published()
            ->featured()
            ->ordered()
            ->limit(4)
            ->withCount('students')
            ->get();

        // Статистика для страницы
        $stats = [
            'users' => User::where('is_active', true)->count(),
            'cohorts' => Cohort::published()->count(),
            'discussions' => Discussion::count(),
            'events' => Event::where('start_time', '>=', now())->count(),
        ];

        return view('welcome', [
            'menuItems' => $menuItems,
            'featuredCohorts' => $featuredCohorts,
            'stats' => $stats,
        ]);
    }

    /**
     * Персональный дашборд для авторизованных пользователей
     * 
     * @return View
     */
    public function dashboard(): View
    {
        $user = auth()->user();

        // Получаем меню
        $menuItems = $this->menuRepository->getTree('main', 'header', $this->detectDevice());

        // Курсы пользователя
        $myCohorts = $user->cohorts()
            ->wherePivot('status', 'active')
            ->withCount('students', 'discussions')
            ->limit(6)
            ->get();

        // Предстоящие события
        $upcomingEvents = Event::whereHas('attendees', function($q) use ($user) {
                $q->where('user_id', $user->id);
            })
            ->where('start_date', '>=', now())
            ->orderBy('start_date')
            ->limit(5)
            ->get();

        // Недавние обсуждения из курсов пользователя
        $recentDiscussions = Discussion::whereIn('cohort_id', $myCohorts->pluck('id'))
            ->with(['user', 'cohort'])
            ->latest()
            ->limit(5)
            ->get();

        return view('dashboard', compact(
            'menuItems',
            'myCohorts',
            'upcomingEvents',
            'recentDiscussions'
        ));
    }

    /**
     * Определить тип устройства на основе User-Agent
     * 
     * @return string desktop|tablet|mobile
     */
    protected function detectDevice(): string
    {
        $userAgent = request()->header('User-Agent', '');

        // Простая проверка (можно улучшить через библиотеку jenssegers/agent)
        if (preg_match('/mobile|android|iphone/i', $userAgent)) {
            return 'mobile';
        }

        if (preg_match('/tablet|ipad/i', $userAgent)) {
            return 'tablet';
        }

        return 'desktop';
    }

    /**
     * Очистить кэш меню (для админов)
     * 
     * @param string $slug
     * @return \Illuminate\Http\RedirectResponse
     */
    public function clearMenuCache(string $slug = 'main')
    {
        $this->authorize('viewAny', \App\Models\Menu::class);
        
        $this->menuRepository->clearCache($slug);

        return back()->with('success', 'Menu cache cleared successfully!');
    }
}
