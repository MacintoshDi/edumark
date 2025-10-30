<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

// 7. Assignment Model (app/Models/Assignment.php)
class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'cohort_id', 'user_id', 'title', 'description', 'instructions',
        'max_points', 'due_date', 'allow_late_submission', 'order'
    ];

    protected $casts = [
        'due_date' => 'datetime',
        'max_points' => 'integer',
        'allow_late_submission' => 'boolean',
        'order' => 'integer',
    ];

    public function cohort(): BelongsTo
    {
        return $this->belongsTo(Cohort::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function submissions(): HasMany
    {
        return $this->hasMany(Submission::class);
    }

    public function isOverdue(): bool
    {
        return $this->due_date && now()->isAfter($this->due_date);
    }

    public function daysUntilDue(): ?int
    {
        if (!$this->due_date) {
            return null;
        }
        return now()->diffInDays($this->due_date, false);
    }

    public function submissionsCount(): int
    {
        return $this->submissions()->count();
    }

    public function gradedCount(): int
    {
        return $this->submissions()->where('status', 'graded')->count();
    }

    public function averageScore(): ?float
    {
        $graded = $this->submissions()->where('status', 'graded')->whereNotNull('points');
        
        if ($graded->count() === 0) {
            return null;
        }

        return round($graded->avg('points'), 2);
    }
}
