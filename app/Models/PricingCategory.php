<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PricingCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function pricingSubcategories(): HasMany
    {
        return $this->hasMany(PricingSubcategory::class);
    }
}