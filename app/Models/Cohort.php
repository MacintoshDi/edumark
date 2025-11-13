<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cohort extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'start_date',
        'end_date',
        'color',
        'icon',
        'is_active',
        'max_students',
        'cover_image',
        'meta',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_active' => 'boolean',
        'max_students' => 'integer',
        'meta' => 'array',
    ];

    // ==========================================
    // RELATIONSHIPS
    // ==========================================

    /**
     * Get students enrolled in this cohort.
     * ИСПРАВЛЕНО: используем User::class вместо Student::class
     * и правильное название таблицы cohort_user
     */
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'cohort_user')
            ->withTimestamps()
            ->withPivot('enrolled_at', 'completed_at', 'status', 'progress', 'role')
            ->wherePivot('status', '!=', 'dropped');
    }

    /**
     * Get all enrolled users (including dropped).
     */
    public function enrolledUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'cohort_user')
            ->withTimestamps()
            ->withPivot('enrolled_at', 'completed_at', 'status', 'progress', 'role');
    }

    /**
     * Get active students.
     */
    public function activeStudents(): BelongsToMany
    {
        return $this->students()
            ->wherePivot('status', 'active');
    }

    /**
     * Get completed students.
     */
    public function completedStudents(): BelongsToMany
    {
        return $this->students()
            ->wherePivot('status', 'completed');
    }

    /**
     * Get teachers for this cohort.
     * ИСПРАВЛЕНО: используем User::class вместо Teacher::class
     * и правильное название таблицы cohort_teacher
     */
    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'cohort_teacher')
            ->withTimestamps()
            ->withPivot('role', 'is_primary');
    }

    /**
     * Get primary teacher.
     */
    public function primaryTeacher(): BelongsToMany
    {
        return $this->teachers()
            ->wherePivot('is_primary', true);
    }

    /**
     * Get resources for this cohort.
     */
    public function resources(): HasMany
    {
        return $this->hasMany(Resource::class);
    }

    /**
     * Get assignments for this cohort.
     */
    public function assignments(): HasMany
    {
        return $this->hasMany(Assignment::class);
    }

    /**
     * Get discussions for this cohort.
     */
    public function discussions(): HasMany
    {
        return $this->hasMany(Discussion::class);
    }

    /**
     * Get events for this cohort.
     */
    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    // ==========================================
    // ACCESSORS
    // ==========================================

    /**
     * Get enrollment count.
     */
    public function getEnrollmentCountAttribute(): int
    {
        return $this->students()->count();
    }

    /**
     * Check if cohort is full.
     */
    public function getIsFullAttribute(): bool
    {
        if (!$this->max_students) {
            return false;
        }

        return $this->enrollment_count >= $this->max_students;
    }

    /**
     * Get available spots.
     */
    public function getAvailableSpotsAttribute(): ?int
    {
        if (!$this->max_students) {
            return null;
        }

        return max(0, $this->max_students - $this->enrollment_count);
    }

    /**
     * Check if cohort has started.
     */
    public function getHasStartedAttribute(): bool
    {
        return $this->start_date && now()->isAfter($this->start_date);
    }

    /**
     * Check if cohort has ended.
     */
    public function getHasEndedAttribute(): bool
    {
        return $this->end_date && now()->isAfter($this->end_date);
    }

    /**
     * Get cohort status.
     */
    public function getStatusAttribute(): string
    {
        if (!$this->is_active) {
            return 'inactive';
        }

        if ($this->has_ended) {
            return 'completed';
        }

        if ($this->has_started) {
            return 'active';
        }

        return 'upcoming';
    }

    // ==========================================
    // SCOPES
    // ==========================================

    /**
     * Scope to get active cohorts.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to get upcoming cohorts.
     */
    public function scopeUpcoming($query)
    {
        return $query->where('start_date', '>', now())
            ->where('is_active', true)
            ->orderBy('start_date', 'asc');
    }

    /**
     * Scope to get ongoing cohorts.
     */
    public function scopeOngoing($query)
    {
        return $query->where('start_date', '<=', now())
            ->where(function ($q) {
                $q->whereNull('end_date')
                    ->orWhere('end_date', '>', now());
            })
            ->where('is_active', true);
    }

    /**
     * Scope to get completed cohorts.
     */
    public function scopeCompleted($query)
    {
        return $query->whereNotNull('end_date')
            ->where('end_date', '<=', now());
    }

    /**
     * Scope to search cohorts.
     */
    public function scopeSearch($query, string $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->orWhere('slug', 'like', "%{$search}%");
        });
    }

    // ==========================================
    // HELPER METHODS
    // ==========================================

    /**
     * Check if user is enrolled.
     */
    public function hasStudent(int $userId): bool
    {
        return $this->students()->where('user_id', $userId)->exists();
    }

    /**
     * Enroll a student.
     */
    public function enrollStudent(int $userId, array $attributes = []): void
    {
        if ($this->is_full) {
            throw new \Exception('Cohort is full');
        }

        $this->students()->attach($userId, array_merge([
            'enrolled_at' => now(),
            'status' => 'active',
            'progress' => 0,
        ], $attributes));
    }

    /**
     * Remove a student.
     */
    public function removeStudent(int $userId): void
    {
        $this->students()->detach($userId);
    }

    /**
     * Check if user is teaching.
     */
    public function hasTeacher(int $userId): bool
    {
        return $this->teachers()->where('user_id', $userId)->exists();
    }

    /**
     * Add a teacher.
     */
    public function addTeacher(int $userId, array $attributes = []): void
    {
        $this->teachers()->attach($userId, $attributes);
    }

    /**
     * Remove a teacher.
     */
    public function removeTeacher(int $userId): void
    {
        $this->teachers()->detach($userId);
    }

    /**
     * Get completion rate.
     */
    public function getCompletionRate(): float
    {
        $total = $this->students()->count();

        if ($total === 0) {
            return 0;
        }

        $completed = $this->completedStudents()->count();

        return round(($completed / $total) * 100, 2);
    }

    /**
     * Get average progress.
     */
    public function getAverageProgress(): float
    {
        return round($this->students()->avg('cohort_user.progress') ?? 0, 2);
    }
}