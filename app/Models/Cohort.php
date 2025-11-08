<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
class Cohort extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'start_date',
        'color',
        'icon',
        'is_active',
    ];
    protected $casts = [
        'start_date' => 'datetime',
        'is_active' => 'boolean',
    ];
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class)->withTimestamps()->withPivot('status');
    }
    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class)->withTimestamps();
    }
    public function resources(): HasMany
    {
        return $this->hasMany(ResourceItem::class);
    }
    public function assignments(): HasMany
    {
        return $this->hasMany(Assignment::class);
    }
    public function discussions(): HasMany
    {
        return $this->hasMany(DiscussionTopic::class);
    }
    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}