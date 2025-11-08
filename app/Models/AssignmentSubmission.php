<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
class AssignmentSubmission extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'assignment_id',
        'student_id',
        'submitted_at',
        'grade',
        'feedback',
        'attachments',
    ];
    protected $casts = [
        'submitted_at' => 'datetime',
        'attachments' => 'array',
    ];
    public function assignment(): BelongsTo
    {
        return $this->belongsTo(Assignment::class);
    }
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}