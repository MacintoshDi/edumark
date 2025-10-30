<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

/**
 * Модель MenuItem
 * 
 * Представляет пункт меню в иерархической структуре
 * 
 * @property int $id
 * @property int $menu_id
 * @property int|null $parent_id
 * @property string $title Название пункта меню
 * @property string|null $url URL ссылки
 * @property string|null $route Название роута Laravel
 * @property string $type Тип: link, dropdown, mega, feature-tile, dynamic-source, button
 * @property int|null $linkable_id Polymorphic ID
 * @property string|null $linkable_type Polymorphic Type
 * @property string|null $icon Название иконки
 * @property string $target _self или _blank
 * @property int $order Порядок сортировки
 * @property bool $is_active Активность пункта
 * @property array|null $devices Массив устройств ['desktop', 'tablet', 'mobile']
 * @property array|null $meta Дополнительные метаданные
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class MenuItem extends Model
{
    /**
     * Типы пунктов меню
     */
    const TYPE_LINK = 'link';
    const TYPE_DROPDOWN = 'dropdown';
    const TYPE_MEGA = 'mega';
    const TYPE_FEATURE_TILE = 'feature-tile';
    const TYPE_DYNAMIC_SOURCE = 'dynamic-source';
    const TYPE_BUTTON = 'button';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'menu_id',
        'parent_id',
        'title',
        'url',
        'route',
        'type',
        'linkable_id',
        'linkable_type',
        'icon',
        'target',
        'order',
        'is_active',
        'devices',
        'meta',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'devices' => 'array',
        'meta' => 'array',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array<string>
     */
    protected $hidden = [];

    /**
     * Родительское меню
     *
     * @return BelongsTo
     */
    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    /**
     * Родительский пункт меню
     *
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(MenuItem::class, 'parent_id');
    }

    /**
     * Дочерние пункты меню
     *
     * @return HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(MenuItem::class, 'parent_id')
            ->orderBy('order');
    }

    /**
     * Активные дочерние пункты меню
     *
     * @return HasMany
     */
    public function activeChildren(): HasMany
    {
        return $this->hasMany(MenuItem::class, 'parent_id')
            ->where('is_active', true)
            ->orderBy('order');
    }

    /**
     * Scope: только активные пункты
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope: только корневые пункты (без родителя)
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeRoot(Builder $query): Builder
    {
        return $query->whereNull('parent_id');
    }

    /**
     * Scope: фильтр по типу
     *
     * @param Builder $query
     * @param string $type
     * @return Builder
     */
    public function scopeOfType(Builder $query, string $type): Builder
    {
        return $query->where('type', $type);
    }

    // ========================================
    // Геттеры для meta полей
    // ========================================

    /**
     * Получить описание из meta
     *
     * @return string|null
     */
    public function getDescriptionAttribute(): ?string
    {
        return $this->meta['description'] ?? null;
    }

    /**
     * Получить иконку из meta (для mega-menu)
     *
     * @return string|null
     */
    public function getIconMetaAttribute(): ?string
    {
        return $this->meta['icon'] ?? null;
    }

    /**
     * Единый аксессор иконки (приоритет: meta['icon'] > icon)
     *
     * @return string|null
     */
    public function getComputedIconAttribute(): ?string
    {
        return $this->meta['icon'] ?? $this->icon;
    }

    /**
     * Получить badge из meta
     *
     * @return string|null
     */
    public function getBadgeAttribute(): ?string
    {
        return $this->meta['badge'] ?? null;
    }

    /**
     * Получить CTA текст из meta
     *
     * @return string|null
     */
    public function getCtaTextAttribute(): ?string
    {
        return $this->meta['cta_text'] ?? null;
    }

    /**
     * Получить source_model для dynamic-source
     *
     * @return string|null
     */
    public function getSourceModelAttribute(): ?string
    {
        return $this->meta['source_model'] ?? null;
    }

    /**
     * Получить source_limit для dynamic-source
     *
     * @return int|null
     */
    public function getSourceLimitAttribute(): ?int
    {
        $limit = $this->meta['source_limit'] ?? null;
        return $limit ? (int) $limit : null;
    }

    /**
     * Получить source_order для dynamic-source
     *
     * @return string|null
     */
    public function getSourceOrderAttribute(): ?string
    {
        return $this->meta['source_order'] ?? null;
    }

    /**
     * Проверить, является ли ссылка внешней
     *
     * @return bool
     */
    public function getIsExternalAttribute(): bool
    {
        return (bool) ($this->meta['is_external'] ?? false);
    }

    // ========================================
    // Хелперы типов
    // ========================================

    /**
     * Проверить, является ли пункт mega-menu
     *
     * @return bool
     */
    public function isMega(): bool
    {
        return $this->type === self::TYPE_MEGA;
    }

    /**
     * Проверить, является ли пункт dropdown
     *
     * @return bool
     */
    public function isDropdown(): bool
    {
        return $this->type === self::TYPE_DROPDOWN;
    }

    /**
     * Проверить, является ли пункт dynamic-source
     *
     * @return bool
     */
    public function isDynamicSource(): bool
    {
        return $this->type === self::TYPE_DYNAMIC_SOURCE;
    }

    /**
     * Проверить, является ли пункт feature-tile
     *
     * @return bool
     */
    public function isFeatureTile(): bool
    {
        return $this->type === self::TYPE_FEATURE_TILE;
    }

    /**
     * Проверить, является ли пункт кнопкой
     *
     * @return bool
     */
    public function isButton(): bool
    {
        return $this->type === self::TYPE_BUTTON;
    }

    /**
     * Проверить, является ли пункт простой ссылкой
     *
     * @return bool
     */
    public function isLink(): bool
    {
        return $this->type === self::TYPE_LINK;
    }

    /**
     * Проверяет, отображается ли пункт на указанном устройстве
     *
     * @param string $device desktop|tablet|mobile
     * @return bool
     */
    public function isVisibleOnDevice(string $device): bool
    {
        // Если devices не указаны, показываем на всех устройствах
        if (empty($this->devices)) {
            return true;
        }

        return in_array($device, $this->devices);
    }

    /**
     * Получить финальный URL для пункта меню
     * 
     * Учитывает приоритет: route > url
     *
     * @return string|null
     */
    public function getHref(): ?string
    {
        if ($this->route) {
            try {
                return route($this->route);
            } catch (\Exception $e) {
                // Если роут не найден, возвращаем url
                return $this->url;
            }
        }

        return $this->url;
    }

    /**
     * Проверить, имеет ли пункт дочерние элементы
     *
     * @return bool
     */
    public function hasChildren(): bool
    {
        return $this->children()->exists();
    }

    /**
     * Проверить, имеет ли пункт активные дочерние элементы
     *
     * @return bool
     */
    public function hasActiveChildren(): bool
    {
        return $this->activeChildren()->exists();
    }

    /**
     * Получить все возможные типы пунктов меню
     *
     * @return array
     */
    public static function getTypes(): array
    {
        return [
            self::TYPE_LINK => 'Ссылка',
            self::TYPE_DROPDOWN => 'Выпадающее меню',
            self::TYPE_MEGA => 'Mega меню',
            self::TYPE_FEATURE_TILE => 'Feature Tile',
            self::TYPE_DYNAMIC_SOURCE => 'Динамический источник',
            self::TYPE_BUTTON => 'Кнопка',
        ];
    }
}