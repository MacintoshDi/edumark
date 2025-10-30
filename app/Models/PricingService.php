<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PricingService extends Model
{
    protected $fillable = [
        'pricing_subcategory_id',
        'name',
        'slug',
        'description',
        'unit',
        'price_without_material',
        'price_with_material',
        'price_premium',
        'min_quantity',
        'order',
        'is_active',
    ];

    protected $casts = [
        'price_without_material' => 'decimal:2',
        'price_with_material' => 'decimal:2',
        'price_premium' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function pricingSubcategory(): BelongsTo
    {
        return $this->belongsTo(PricingSubcategory::class);
    }
}