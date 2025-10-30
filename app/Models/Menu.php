<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

/**
 * Модель Menu
 * 
 * Представляет меню сайта (header, footer, sidebar и т.д.)
 * 
 * @property int $id
 * @property string $name Название меню
 * @property string $slug Уникальный slug
 * @property string $location Расположение (header, footer, other)
 * @property array|null $devices Массив устройств для отображения ['desktop', 'tablet', 'mobile']
 * @property bool $is_active Активность меню
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Menu extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'slug',
        'location',
        'devices',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'devices' => 'array',
        'is_active' => 'boolean',
    ];

    /**
     * Все пункты меню (включая дочерние)
     *
     * @return HasMany
     */
    public function items(): HasMany
    {
        return $this->hasMany(MenuItem::class);
    }

    /**
     * Только корневые пункты меню (без родителя)
     *
     * @return HasMany
     */
    public function menuItems(): HasMany
    {
        return $this->hasMany(MenuItem::class)
            ->whereNull('parent_id')
            ->orderBy('order');
    }

    /**
     * Активные корневые пункты меню
     *
     * @return HasMany
     */
    public function activeRootItems(): HasMany
    {
        return $this->hasMany(MenuItem::class)
            ->whereNull('parent_id')
            ->where('is_active', true)
            ->orderBy('order');
    }

    /**
     * Scope: только активные меню
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope: фильтр по расположению
     *
     * @param Builder $query
     * @param string $location
     * @return Builder
     */
    public function scopeByLocation(Builder $query, string $location): Builder
    {
        return $query->where('location', $location);
    }

    /**
     * Scope: фильтр по slug
     *
     * @param Builder $query
     * @param string $slug
     * @return Builder
     */
    public function scopeBySlug(Builder $query, string $slug): Builder
    {
        return $query->where('slug', $slug);
    }

    /**
     * Проверяет, отображается ли меню на указанном устройстве
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
     * Получить дерево меню с загруженными отношениями
     *
     * @param string|null $device Фильтр по устройству
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getTreeWithRelations(?string $device = null)
    {
        $query = $this->activeRootItems()->with([
            'children' => function ($query) use ($device) {
                $query->where('is_active', true)->orderBy('order');
                
                if ($device) {
                    $query->where(function ($q) use ($device) {
                        $q->whereJsonContains('devices', $device)
                          ->orWhereNull('devices');
                    });
                }
            }
        ]);

        if ($device) {
            $query->where(function ($q) use ($device) {
                $q->whereJsonContains('devices', $device)
                  ->orWhereNull('devices');
            });
        }

        return $query->get();
    }
}