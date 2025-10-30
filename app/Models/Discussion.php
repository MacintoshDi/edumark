<?php

/**
 * ELOQUENT MODELS FOR EDUMARK PLATFORM - PART 2
 * Place in app/Models/
 */

namespace App\Models;

// 4. Discussion Model (app/Models/Discussion.php)
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Discussion extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'cohort_id', 'category_id', 'title', 'content',
        'type', 'is_pinned', 'is_locked', 'is_featured', 'views'
    ];

    protected $casts = [
        'is_pinned' => 'boolean',
        'is_locked' => 'boolean',
        'is_featured' => 'boolean',
        'views' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function cohort(): BelongsTo
    {
        return $this->belongsTo(Cohort::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function replies(): HasMany
    {
        return $this->hasMany(Reply::class);
    }

    public function likes(): MorphMany
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function incrementViews(): void
    {
        $this->increment('views');
    }

    public function repliesCount(): int
    {
        return $this->replies()->count();
    }

    public function likesCount(): int
    {
        return $this->likes()->count();
    }

    public function isLikedBy(?User $user): bool
    {
        if (!$user) {
            return false;
        }
        return $this->likes()->where('user_id', $user->id)->exists();
    }
}