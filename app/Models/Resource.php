<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resource extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'type',
        'url',
        'file_path',
        'cohort_id',
    ];

    public function cohort()
    {
        return $this->belongsTo(Cohort::class);
    }
}
