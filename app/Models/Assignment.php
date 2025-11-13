<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assignment extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cohort_id',
        'user_id',
        'title',
        'description',
        'instructions',
        'due_date',
        'max_points',
        'order',
        'allow_late_submission',
        'is_published',
        'attachments',
        'meta',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'due_date' => 'datetime',
        'is_published' => 'boolean',
        'allow_late_submission' => 'boolean',
        'attachments' => 'array',
        'meta' => 'array',
        'max_points' => 'integer',
        'order' => 'integer',
    ];

    // ==========================================
    // RELATIONSHIPS
    // ==========================================

    /**
     * Get the cohort that owns the assignment.
     */
    public function cohort(): BelongsTo
    {
        return $this->belongsTo(Cohort::class);
    }

    /**
     * Get the user (teacher) who created the assignment.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get assignment submissions.
     */
    public function submissions(): HasMany
    {
        return $this->hasMany(AssignmentSubmission::class);
    }

    // ==========================================
    // ACCESSORS
    // ==========================================

    /**
     * Check if assignment is overdue.
     */
    public function getIsOverdueAttribute(): bool
    {
        if (!$this->due_date) {
            return false;
        }

        return now()->isAfter($this->due_date);
    }

    /**
     * Get days until due.
     */
    public function getDaysUntilDueAttribute(): ?int
    {
        if (!$this->due_date) {
            return null;
        }

        return now()->diffInDays($this->due_date, false);
    }

    /**
     * Get submission rate.
     */
    public function getSubmissionRateAttribute(): float
    {
        $totalStudents = $this->cohort->students()->count();
        
        if ($totalStudents === 0) {
            return 0;
        }

        $submissions = $this->submissions()->count();

        return round(($submissions / $totalStudents) * 100, 2);
    }

    /**
     * Get average grade.
     */
    public function getAverageGradeAttribute(): ?float
    {
        $graded = $this->submissions()
            ->whereNotNull('grade')
            ->get();

        if ($graded->isEmpty()) {
            return null;
        }

        return round($graded->avg('grade'), 2);
    }

    // ==========================================
    // SCOPES
    // ==========================================

    /**
     * Scope to get published assignments.
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Scope to get upcoming assignments.
     */
    public function scopeUpcoming($query)
    {
        return $query->where('due_date', '>', now())
            ->orderBy('due_date', 'asc');
    }

    /**
     * Scope to get overdue assignments.
     */
    public function scopeOverdue($query)
    {
        return $query->where('due_date', '<', now())
            ->orderBy('due_date', 'desc');
    }

    /**
     * Scope to get available assignments (published and not overdue or allows late submission).
     */
    public function scopeAvailable($query)
    {
        return $query->published()
            ->where(function ($q) {
                $q->where('due_date', '>', now())
                    ->orWhere('allow_late_submission', true)
                    ->orWhereNull('due_date');
            });
    }

    /**
     * Scope to order by assignment order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    /**
     * Scope to filter by cohort.
     */
    public function scopeForCohort($query, $cohortId)
    {
        return $query->where('cohort_id', $cohortId);
    }

    // ==========================================
    // HELPER METHODS
    // ==========================================

    /**
     * Check if user has submitted assignment.
     */
    public function hasSubmission(int $userId): bool
    {
        return $this->submissions()
            ->where('user_id', $userId)
            ->exists();
    }

    /**
     * Get user's submission.
     */
    public function getSubmissionFor(int $userId)
    {
        return $this->submissions()
            ->where('user_id', $userId)
            ->first();
    }

    /**
     * Check if assignment accepts submissions.
     */
    public function acceptsSubmissions(): bool
    {
        if (!$this->is_published) {
            return false;
        }

        if (!$this->due_date) {
            return true;
        }

        if ($this->allow_late_submission) {
            return true;
        }

        return now()->isBefore($this->due_date);
    }

    /**
     * Get status badge color.
     */
    public function getStatusBadgeColor(): string
    {
        if (!$this->is_published) {
            return 'gray';
        }

        if ($this->is_overdue && !$this->allow_late_submission) {
            return 'red';
        }

        if ($this->days_until_due !== null && $this->days_until_due <= 3) {
            return 'yellow';
        }

        return 'green';
    }

    /**
     * Get status text.
     */
    public function getStatusText(): string
    {
        if (!$this->is_published) {
            return 'Draft';
        }

        if ($this->is_overdue) {
            return $this->allow_late_submission ? 'Late Submission Allowed' : 'Overdue';
        }

        if ($this->days_until_due !== null) {
            if ($this->days_until_due === 0) {
                return 'Due Today';
            }

            if ($this->days_until_due > 0) {
                return "Due in {$this->days_until_due} days";
            }
        }

        return 'Active';
    }
}