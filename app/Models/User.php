<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
    'name',
    'first_name',
    'last_name',
    'email',
    'phone',
    'password',
    'avatar',
    'bio',
    'location',
    'role',
    'interests',
    'goals',
    'linkedin',
    'github',
    'twitter',
    'locale',
    'timezone',
    'facebook_id',
    'google_id',
    'provider',
    'provider_id',
    'is_active',
    'is_mentor',
    'points',
];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
        'social_links' => 'array',
        'is_active' => 'boolean',
        'password' => 'hashed',
    ];

    /**
     * User roles.
     */
    const ROLES = [
        'student' => 'Student',
        'teacher' => 'Teacher',
        'admin' => 'Admin',
        'moderator' => 'Moderator',
    ];

    // ==========================================
    // RELATIONSHIPS
    // ==========================================

    /**
     * Get the user's primary cohort.
     */
    public function cohort(): BelongsTo
    {
        return $this->belongsTo(Cohort::class);
    }

    /**
     * Get the user's profile.
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * Get cohorts where user is a student.
     */
    public function enrolledCohorts(): BelongsToMany
    {
        return $this->belongsToMany(Cohort::class, 'cohort_user')
            ->withPivot('enrolled_at', 'completed_at', 'status', 'progress', 'role')
            ->withTimestamps();
    }

    /**
     * Get cohorts where user is a teacher.
     */
    public function teachingCohorts(): BelongsToMany
    {
        return $this->belongsToMany(Cohort::class, 'cohort_teacher')
            ->withPivot('role', 'is_primary')
            ->withTimestamps();
    }

    /**
     * Get active cohorts (for students).
     */
    public function activeCohorts(): BelongsToMany
    {
        return $this->enrolledCohorts()
            ->wherePivot('status', 'active')
            ->where('cohorts.is_active', true);
    }

    /**
     * Get created resources.
     */
    public function resources(): HasMany
    {
        return $this->hasMany(Resource::class, 'user_id');
    }

    /**
     * Get created assignments.
     */
    public function createdAssignments(): HasMany
    {
        return $this->hasMany(Assignment::class, 'user_id');
    }

    /**
     * Get assignment submissions.
     */
    public function assignmentSubmissions(): HasMany
    {
        return $this->hasMany(AssignmentSubmission::class);
    }

    /**
     * Get discussions created by user.
     */
    public function discussions(): HasMany
    {
        return $this->hasMany(Discussion::class, 'author_id');
    }

    /**
     * Get discussion comments.
     */
    public function discussionComments(): HasMany
    {
        return $this->hasMany(DiscussionComment::class, 'user_id');
    }

    /**
     * Get hosted events.
     */
    public function hostedEvents(): HasMany
    {
        return $this->hasMany(Event::class, 'host_id');
    }

    /**
     * Get registered events.
     */
    public function registeredEvents(): BelongsToMany
    {
        return $this->belongsToMany(Event::class, 'event_user')
            ->withPivot('status', 'registered_at')
            ->withTimestamps();
    }

    /**
     * Get teacher profile (if user is teacher).
     */
    public function teacher(): HasOne
    {
        return $this->hasOne(Teacher::class);
    }

    // ==========================================
    // HELPER METHODS
    // ==========================================
    
    /**
 * Get full name
 */
public function getFullNameAttribute(): string
{
    if ($this->first_name && $this->last_name) {
        return "{$this->first_name} {$this->last_name}";
    }
    return $this->name;
} 

    /**
     * Check if user is admin.
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Check if user is teacher or admin.
     */
    public function isTeacher(): bool
    {
        return in_array($this->role, ['teacher', 'admin']);
    }

    /**
     * Check if user is student.
     */
    public function isStudent(): bool
    {
        return $this->role === 'student';
    }

    /**
     * Check if user is moderator or admin.
     */
    public function isModerator(): bool
    {
        return in_array($this->role, ['moderator', 'admin']);
    }

    /**
     * Check if user can access Filament panel.
     */
    public function canAccessPanel(Panel $panel): bool
    {
        // Admin panel - only admin, teacher, moderator
        if ($panel->getId() === 'admin') {
            return in_array($this->role, ['admin', 'teacher', 'moderator']) && $this->is_active;
        }

        // Other panels - all active users
        return $this->is_active;
    }

    /**
     * Check if user is enrolled in specific cohort.
     */
    public function isEnrolledIn(int $cohortId): bool
    {
        return $this->enrolledCohorts()
            ->where('cohort_id', $cohortId)
            ->exists();
    }

    /**
     * Check if user is teaching specific cohort.
     */
    public function isTeachingIn(int $cohortId): bool
    {
        return $this->teachingCohorts()
            ->where('cohort_id', $cohortId)
            ->exists();
    }

    /**
     * Get user's full name or email.
     */
    public function getDisplayNameAttribute(): string
    {
        return $this->name ?? $this->email;
    }

    /**
     * Get user's avatar URL or generate initials avatar.
     */
    public function getAvatarUrlAttribute(): string
    {
        if ($this->avatar) {
            return asset('storage/' . $this->avatar);
        }

        // Generate initials avatar (UI Avatars or similar service)
        $name = urlencode($this->name ?? 'User');
        return "https://ui-avatars.com/api/?name={$name}&size=200&background=3B82F6&color=fff";
    }

    /**
     * Get user's initials for avatar fallback.
     */
    public function getInitialsAttribute(): string
    {
        $words = explode(' ', $this->name ?? 'U');
        $initials = '';

        foreach ($words as $word) {
            if (!empty($word)) {
                $initials .= strtoupper(substr($word, 0, 1));
            }
        }

        return substr($initials, 0, 2);
    }

    /**
     * Update last login timestamp.
     */
    public function updateLastLogin(): void
    {
        $this->update(['last_login_at' => now()]);
    }

    // ==========================================
    // SCOPES
    // ==========================================

    /**
     * Scope to filter active users.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to filter by role.
     */
    public function scopeRole($query, string $role)
    {
        return $query->where('role', $role);
    }

    /**
     * Scope to filter students.
     */
    public function scopeStudents($query)
    {
        return $query->where('role', 'student');
    }

    /**
     * Scope to filter teachers.
     */
    public function scopeTeachers($query)
    {
        return $query->whereIn('role', ['teacher', 'admin']);
    }

    /**
     * Scope to search users by name or email.
     */
    public function scopeSearch($query, string $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        });
    }
}