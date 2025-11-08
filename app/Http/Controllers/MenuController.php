<?php
namespace App\Http\Controllers;
use App\Repositories\MenuRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
class MenuController extends Controller
{
    public function __construct(private MenuRepository $menus)
    {
    }
    public function show(Request $request, string $slug, string $location): View
    {
        $device = $this->detectDevice($request);
        return view('components.menus.dynamic-menu', [
            'items' => $this->menus->getTree($slug, $location, $device),
            'device' => $device,
        ]);
    }
    protected function detectDevice(Request $request): string
    {
        if ($request->headers->has('X-Device')) {
            return strtolower($request->headers->get('X-Device'));
        }
        $agent = strtolower($request->userAgent() ?? '');
        return match (true) {
            str_contains($agent, 'ipad') || str_contains($agent, 'tablet') => 'tablet',
            str_contains($agent, 'mobile') || str_contains($agent, 'iphone') || str_contains($agent, 'android') => 'mobile',
            default => 'desktop',
        };
    }
}