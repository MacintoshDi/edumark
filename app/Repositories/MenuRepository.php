<?php
namespace App\Repositories;
use App\Models\Menu;
use Illuminate\Cache\Repository as CacheRepository;
use Illuminate\Support\Collection;
class MenuRepository
{
    public function __construct(private CacheRepository $cache)
    {
    }
    public function getTree(string $slug, ?string $location = null, ?string $device = null): Collection
    {
        $cacheKey = $this->getCacheKey($slug, $location, $device);
        return $this->cache->remember($cacheKey, now()->addHour(), function () use ($slug, $location, $device) {
            $query = Menu::query()->with(['allItems.children'])->where('slug', $slug);
            if ($location) {
                $query->forLocation($location);
            }
            $menu = $query->first();
            if (! $menu) {
                return collect();
            }
            $items = $menu->items
                ->map(fn ($item) => $this->transformItem($item, $device))
                ->filter();
            return $items->values();
        });
    }
    public function flush(string $slug, ?string $location = null): void
    {
        foreach (['desktop', 'tablet', 'mobile', null] as $device) {
            $this->cache->forget($this->getCacheKey($slug, $location, $device));
        }
    }
    protected function transformItem($item, ?string $device): ?array
    {
        if ($device && $item->device_visibility && ! in_array($device, $item->device_visibility, true)) {
            return null;
        }
        if (! $item->is_active) {
            return null;
        }
        $children = $item->children
            ->map(fn ($child) => $this->transformItem($child, $device))
            ->filter()
            ->values();
        return [
            'id' => $item->id,
            'type' => $item->type,
            'title' => $item->title,
            'slug' => $item->slug,
            'url' => $item->url,
            'icon' => $item->icon,
            'metadata' => $item->metadata,
            'children' => $children,
        ];
    }
    protected function getCacheKey(string $slug, ?string $location, ?string $device): string
    {
        return implode(':', array_filter(['menu-tree', $slug, $location, $device]));
    }
}