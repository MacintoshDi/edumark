<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Category extends Model
{
    protected $fillable = ['name', 'description', 'slug', 'icon'];

    public function subcategories(): HasMany
    {
        return $this->hasMany(Subcategory::class);
    }
    
    public function services(): HasManyThrough
    {
        return $this->hasManyThrough(Service::class, Subcategory::class);
    }
}