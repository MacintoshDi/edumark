<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cohort_id',
        'title',
        'description',
        'type',
        'location',
        'meeting_url',
        'start_time',
        'end_time',
        'max_attendees',
        'thumbnail',
        'is_featured',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'max_attendees' => 'integer',
        'is_featured' => 'boolean',
    ];

    /**
     * Организатор события
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Курс, к которому привязано событие
     */
    public function cohort(): BelongsTo
    {
        return $this->belongsTo(Cohort::class);
    }

    /**
     * Участники события (many-to-many)
     */
    public function attendees(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'event_user')
            ->withPivot(['status', 'attended_at'])
            ->withTimestamps();
    }

    /**
     * Scope: предстоящие события
     */
    public function scopeUpcoming(Builder $query): void
    {
        $query->where('start_time', '>=', now())
              ->orderBy('start_time', 'asc');
    }

    /**
     * Scope: прошедшие события
     */
    public function scopePast(Builder $query): void
    {
        $query->where('start_time', '<', now())
              ->orderBy('start_time', 'desc');
    }

    /**
     * Scope: популярные события
     */
    public function scopeFeatured(Builder $query): void
    {
        $query->where('is_featured', true);
    }

    /**
     * Проверка: событие уже прошло?
     */
    public function isPast(): bool
    {
        return $this->start_time->isPast();
    }

    /**
     * Проверка: событие скоро начнётся?
     */
    public function isUpcoming(): bool
    {
        return $this->start_time->isFuture();
    }

    /**
     * Проверка: событие идёт прямо сейчас?
     */
    public function isLive(): bool
    {
        return now()->between($this->start_time, $this->end_time);
    }

    /**
     * Проверка: достигнут лимит участников?
     */
    public function isFull(): bool
    {
        if (!$this->max_attendees) {
            return false;
        }
        return $this->attendees()->count() >= $this->max_attendees;
    }

    /**
     * Количество участников
     */
    public function attendeesCount(): int
    {
        return $this->attendees()->count();
    }

    /**
     * Свободные места
     */
    public function spotsRemaining(): ?int
    {
        if (!$this->max_attendees) {
            return null;
        }
        return max(0, $this->max_attendees - $this->attendeesCount());
    }

    /**
     * Проверка: пользователь зарегистрирован на событие?
     */
    public function isUserRegistered(User $user): bool
    {
        return $this->attendees()->where('user_id', $user->id)->exists();
    }

    /**
     * Получить название типа события
     */
    public function getTypeNameAttribute(): string
    {
        return match($this->type) {
            'workshop' => 'Workshop',
            'webinar' => 'Webinar',
            'meetup' => 'Meetup',
            'office_hours' => 'Office Hours',
            default => ucfirst($this->type ?? 'Event'),
        };
    }

    /**
     * Получить короткое описание
     */
    public function getShortDescriptionAttribute(): ?string
    {
        if (!$this->description) {
            return null;
        }
        return \Illuminate\Support\Str::limit($this->description, 150);
    }

    /**
     * Получить форматированную дату и время
     */
    public function getFormattedDateAttribute(): string
    {
        return $this->start_time->format('F j, Y \a\t g:i A');
    }
}
