<?php

namespace App\Repositories;

use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

/**
 * Репозиторий для работы с меню
 * 
 * Отвечает за загрузку, фильтрацию и кэширование меню
 */
class MenuRepository
{
    /**
     * Получить дерево меню
     *
     * @param string $slug Slug меню
     * @param string|null $location Расположение меню (header, footer, etc)
     * @param string $device Устройство (desktop, tablet, mobile)
     * @return array|null
     */
    public function getTree(string $slug, ?string $location = null, string $device = 'desktop'): ?array
    {
        $cacheKey = $this->cacheKey($slug, $location, $device);

        return Cache::remember($cacheKey, 3600, function () use ($slug, $location, $device) {
            // Находим меню
            $query = Menu::where('slug', $slug)->where('is_active', true);
            
            if ($location) {
                $query->where('location', $location);
            }
            
            $menu = $query->first();
            
            if (!$menu) {
                return null;
            }

            // Проверяем видимость меню на устройстве
            if (!$menu->isVisibleOnDevice($device)) {
                return null;
            }

            // Загружаем дерево пунктов меню
            $items = $menu->activeRootItems()
                ->with(['activeChildren.activeChildren.activeChildren']) // Глубина 3
                ->get()
                ->map(function ($item) use ($device, $menu) {
                    return $this->mapItem($item, $device, 0, 3, $menu);
                })
                ->filter() // Убираем null (невидимые на устройстве)
                ->values()
                ->toArray();

            return [
                'menu' => $menu->slug,
                'location' => $menu->location,
                'items' => $items,
            ];
        });
    }

    /**
     * Маппинг пункта меню в массив
     *
     * @param MenuItem $item
     * @param string $device
     * @param int $depth Текущая глубина
     * @param int $maxDepth Максимальная глубина
     * @param Menu|null $menu
     * @return array|null
     */
    protected function mapItem(MenuItem $item, string $device, int $depth = 0, int $maxDepth = 3, ?Menu $menu = null): ?array
    {
        // Проверяем видимость на устройстве
        if (!$this->isVisibleOnDevice($item, $device, $menu)) {
            return null;
        }

        $data = [
            'id' => $item->id,
            'title' => $item->title,
            'type' => $item->type,
            'url' => $item->getHref(),
            'target' => $item->target,
            'order' => $item->order,
            'icon' => $item->computed_icon,
        ];

        // Добавляем meta для feature-tile
        if ($item->isFeatureTile()) {
            $data['description'] = $item->description;
            $data['badge'] = $item->badge;
            $data['cta_text'] = $item->cta_text ?? 'Join';
        }

        // Добавляем дополнительные поля из meta если есть
        if (!empty($item->meta)) {
            $data['meta'] = $item->meta;
        }

        // Обрабатываем dynamic-source
        if ($item->isDynamicSource()) {
            $data['resolved'] = $this->resolveDynamic($item);
        }

        // Обрабатываем дочерние элементы (если не достигли максимальной глубины)
        if ($depth < $maxDepth && $item->activeChildren->isNotEmpty()) {
            $children = $item->activeChildren
                ->map(function ($child) use ($device, $depth, $maxDepth, $menu) {
                    return $this->mapItem($child, $device, $depth + 1, $maxDepth, $menu);
                })
                ->filter() // Убираем null
                ->values()
                ->toArray();

            if (!empty($children)) {
                $data['children'] = $children;
            }
        }

        return $data;
    }

    /**
     * Разрешить dynamic-source (загрузить данные из модели)
     *
     * @param MenuItem $item
     * @return array
     */
    public function resolveDynamic(MenuItem $item): array
    {
        $sourceModel = $item->source_model;
        $sourceLimit = $item->source_limit ?? 4;
        $sourceOrder = $item->source_order ?? 'order asc';

        if (!$sourceModel || !class_exists($sourceModel)) {
            return [];
        }

        try {
            // Создаем запрос к модели
            $query = $sourceModel::query();

            // Применяем сортировку
            if ($sourceOrder) {
                $orderParts = explode(',', $sourceOrder);
                foreach ($orderParts as $orderPart) {
                    $orderPart = trim($orderPart);
                    $parts = explode(' ', $orderPart);
                    $column = $parts[0];
                    $direction = $parts[1] ?? 'asc';
                    $query->orderBy($column, $direction);
                }
            }

            // Ограничиваем количество
            $query->limit($sourceLimit);

            // Только активные записи (если есть поле is_active или status)
            if (method_exists($sourceModel, 'scopeActive')) {
                $query->active();
            } elseif (in_array('is_active', (new $sourceModel)->getFillable())) {
                $query->where('is_active', true);
            } elseif (in_array('status', (new $sourceModel)->getFillable())) {
                $query->where('status', 'published');
            }

            $records = $query->get();

            // Маппим записи
            return $records->map(function ($record) {
                $data = [
                    'title' => $record->title ?? $record->name ?? 'Untitled',
                    'description' => $record->description ?? null,
                    'badge' => $record->badge ?? null,
                    'cta_text' => 'Join',
                ];

                // URL
                if (method_exists($record, 'toMenuUrl')) {
                    $data['url'] = $record->toMenuUrl();
                } elseif (isset($record->slug)) {
                    $modelName = strtolower(class_basename($record));
                    $data['url'] = '/' . Str::plural($modelName) . '/' . $record->slug;
                } else {
                    $data['url'] = '#';
                }

                // Статистика (если есть)
                if (isset($record->members_count) || isset($record->posts_count)) {
                    $data['stats'] = [];
                    if (isset($record->members_count)) {
                        $data['stats']['members'] = $record->members_count;
                    }
                    if (isset($record->posts_count)) {
                        $data['stats']['posts'] = $record->posts_count;
                    }
                }

                return $data;
            })->toArray();

        } catch (\Exception $e) {
            // Логируем ошибку и возвращаем пустой массив
            \Log::error('MenuRepository: Failed to resolve dynamic source', [
                'model' => $sourceModel,
                'error' => $e->getMessage()
            ]);
            return [];
        }
    }

    /**
     * Проверить видимость пункта меню на устройстве
     *
     * @param MenuItem $item
     * @param string $device
     * @param Menu|null $menu
     * @return bool
     */
    public function isVisibleOnDevice(MenuItem $item, string $device, ?Menu $menu = null): bool
    {
        // Если у пункта указаны devices - используем их
        if (!empty($item->devices)) {
            return in_array($device, $item->devices);
        }

        // Иначе смотрим на devices меню
        if ($menu && !empty($menu->devices)) {
            return in_array($device, $menu->devices);
        }

        // Если нигде не указано - показываем на всех устройствах
        return true;
    }

    /**
     * Генерация ключа кэша
     *
     * @param string $slug
     * @param string|null $location
     * @param string $device
     * @return string
     */
    protected function cacheKey(string $slug, ?string $location, string $device): string
    {
        $parts = ['menu', $slug, $device];
        
        if ($location) {
            $parts[] = $location;
        }
        
        return implode(':', $parts);
    }

    /**
     * Очистить кэш меню
     *
     * @param string $slug Slug меню для очистки
     * @return void
     */
    public function clearCache(string $slug): void
    {
        // Очищаем кэш для конкретного меню по всем комбинациям устройств и локаций
        $devices = ['desktop', 'tablet', 'mobile'];
        $locations = ['header', 'footer', 'sidebar', null];
        
        foreach ($devices as $device) {
            foreach ($locations as $location) {
                $key = $this->cacheKey($slug, $location, $device);
                Cache::forget($key);
            }
        }
    }
}