<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Follow extends Model
{
    use HasFactory;

    protected $fillable = [
        'follower_id',       // пользователь, который подписывается
        'followable_id',     // ID сущности (пользователь, коорт и т.д.)
        'followable_type',   // Класс сущности (App\Models\User и т.п.)
    ];

    public function follower(): BelongsTo
    {
        return $this->belongsTo(User::class, 'follower_id');
    }

    public function followable(): MorphTo
    {
        return $this->morphTo();
    }
}
