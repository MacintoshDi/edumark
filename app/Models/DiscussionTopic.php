<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
class DiscussionTopic extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'cohort_id',
        'discussion_category_id',
        'title',
        'slug',
        'content',
        'is_locked',
        'is_pinned',
        'created_by',
    ];
    protected $casts = [
        'is_locked' => 'boolean',
        'is_pinned' => 'boolean',
    ];
    public function cohort(): BelongsTo
    {
        return $this->belongsTo(Cohort::class);
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(DiscussionCategory::class, 'discussion_category_id');
    }
    public function replies(): HasMany
    {
        return $this->hasMany(DiscussionReply::class);
    }
}