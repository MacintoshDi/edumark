<?php

/**
 * ELOQUENT MODELS FOR EDUMARK PLATFORM - PART 4
 * Place in app/Models/
 */

namespace App\Models;

// 16. Spotlight Model (app/Models/Spotlight.php)
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Spotlight extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'content', 'featured_image',
        'type', 'is_published', 'published_at'
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
                    ->whereNotNull('published_at')
                    ->where('published_at', '<=', now());
    }

    public function publish(): void
    {
        $this->update([
            'is_published' => true,
            'published_at' => now(),
        ]);
    }
}