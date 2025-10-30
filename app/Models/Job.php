<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs_board';

    protected $fillable = [
        'user_id', 'title', 'description', 'type', 'company',
        'location', 'is_remote', 'salary_min', 'salary_max',
        'salary_currency', 'skills_required', 'application_url',
        'application_email', 'deadline', 'status', 'views'
    ];

    protected $casts = [
        'is_remote' => 'boolean',
        'salary_min' => 'decimal:2',
        'salary_max' => 'decimal:2',
        'skills_required' => 'array',
        'deadline' => 'date',
    ];
}