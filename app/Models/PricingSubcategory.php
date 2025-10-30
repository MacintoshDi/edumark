<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PricingSubcategory extends Model
{
    protected $fillable = [
        'pricing_category_id',
        'name',
        'slug',
        'description',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function pricingCategory(): BelongsTo
    {
        return $this->belongsTo(PricingCategory::class);
    }

    public function pricingServices(): HasMany
    {
        return $this->hasMany(PricingService::class);
    }
}