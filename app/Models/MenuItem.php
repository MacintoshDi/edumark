<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
class MenuItem extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'menu_id',
        'parent_id',
        'type',
        'title',
        'slug',
        'url',
        'icon',
        'metadata',
        'is_active',
        'device_visibility',
        'position',
    ];
    protected $casts = [
        'is_active' => 'boolean',
        'metadata' => 'array',
        'device_visibility' => 'array',
    ];
    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }
    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }
    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id')->orderBy('position');
    }
}