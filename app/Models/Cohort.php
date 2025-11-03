<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Cohort extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'category_id',
        'start_date',
        'end_date',
        'max_students',
        'price',
        'status',
        'features',
        'badge',
        'icon',
        'published',
        'order',
        'starts_at',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'starts_at' => 'datetime',
        'price' => 'decimal:2',
        'max_students' => 'integer',
        'features' => 'array',
        'published' => 'boolean',
        'order' => 'integer',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->withPivot(['role', 'enrolled_at', 'completed_at', 'progress', 'status'])
            ->withTimestamps();
    }

    public function students(): BelongsToMany
    {
        return $this->users()->wherePivot('role', 'student');
    }

    public function teachers(): BelongsToMany
    {
        return $this->users()->wherePivot('role', 'teacher');
    }

    public function resources(): HasMany
    {
        return $this->hasMany(Resource::class);
    }

    public function assignments(): HasMany
    {
        return $this->hasMany(Assignment::class);
    }

    public function discussions(): HasMany
    {
        return $this->hasMany(Discussion::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    public function scopePublished(Builder $query): void
    {
        $query->where('published', true);
    }

    public function scopeActive(Builder $query): void
    {
        $query->where('status', 'active');
    }

    public function scopeOrdered(Builder $query): void
    {
        $query->orderBy('order', 'asc')
              ->orderBy('starts_at', 'desc')
              ->orderBy('name', 'asc');
    }

    public function scopeFeatured(Builder $query): void
    {
        $query->where(function ($q) {
            $q->whereNotNull('badge')
              ->orWhereNotNull('icon');
        });
    }

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    public function isPublished(): bool
    {
        return in_array($this->status, ['published', 'active']) && $this->published;
    }

    public function isFull(): bool
    {
        if (!$this->max_students) {
            return false;
        }
        return $this->students()->count() >= $this->max_students;
    }

    public function enrolledCount(): int
    {
        return $this->students()->count();
    }

    public function spotsRemaining(): ?int
    {
        if (!$this->max_students) {
            return null;
        }
        return max(0, $this->max_students - $this->enrolledCount());
    }

    public function getTitleAttribute(): string
    {
        return $this->name;
    }

    public function getShortDescriptionAttribute(): ?string
    {
        if (!$this->description) {
            return null;
        }
        return \Illuminate\Support\Str::limit($this->description, 140);
    }
}