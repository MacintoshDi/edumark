<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
class ResourceItem extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'cohort_id',
        'title',
        'type',
        'description',
        'file_path',
        'url',
        'metadata',
        'is_published',
    ];
    protected $casts = [
        'metadata' => 'array',
        'is_published' => 'boolean',
    ];
    public function cohort(): BelongsTo
    {
        return $this->belongsTo(Cohort::class);
    }
}