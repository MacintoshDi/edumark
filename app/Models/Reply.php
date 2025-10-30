<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = [
        'discussion_id',
        'user_id',
        'body',
        'parent_id',
    ];

    public function discussion(): BelongsTo
    {
        return $this->belongsTo(Discussion::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Reply::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Reply::class, 'parent_id');
    }
}
