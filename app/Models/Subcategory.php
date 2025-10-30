<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subcategory extends Model
{
    protected $fillable = ['category_id', 'name', 'description', 'slug'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }
}