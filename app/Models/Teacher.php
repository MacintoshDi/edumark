<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
class Teacher extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'specialization',
        'location',
        'bio',
        'avatar_path',
    ];
    public function cohorts(): BelongsToMany
    {
        return $this->belongsToMany(Cohort::class)->withTimestamps();
    }
}