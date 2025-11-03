<?php

/**
 * ELOQUENT MODELS FOR EDUMARK PLATFORM - PART 1
 * Place in app/Models/
 */

namespace App\Models;

// 1. User Model (app/Models/User.php)
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name', 'email', 'password', 'role', 'bio', 'avatar',
        'interests', 'goals', 'linkedin', 'github', 'twitter',
        'points', 'is_mentor', 'is_active'
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'interests' => 'array',
        'goals' => 'array',
        'is_mentor' => 'boolean',
        'is_active' => 'boolean',
        'points' => 'integer',
    ];

    // Relationships
    public function cohorts(): BelongsToMany
    {
        return $this->belongsToMany(Cohort::class)
            ->withPivot(['role', 'enrolled_at', 'completed_at', 'progress', 'status'])
            ->withTimestamps();
    }

    public function discussions(): HasMany
    {
        return $this->hasMany(Discussion::class);
    }

    public function replies(): HasMany
    {
        return $this->hasMany(Reply::class);
    }

    public function resources(): HasMany
    {
        return $this->hasMany(Resource::class);
    }

    public function assignments(): HasMany
    {
        return $this->hasMany(Assignment::class);
    }

    public function submissions(): HasMany
    {
        return $this->hasMany(Submission::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    public function registeredEvents(): BelongsToMany
    {
        return $this->belongsToMany(Event::class)
            ->withPivot(['status', 'registered_at'])
            ->withTimestamps();
    }

    public function badges(): BelongsToMany
    {
        return $this->belongsToMany(Badge::class)
            ->withPivot('earned_at')
            ->withTimestamps();
    }

    public function sentMessages(): HasMany
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function receivedMessages(): HasMany
    {
        return $this->hasMany(Message::class, 'recipient_id');
    }

    public function mentorships(): HasMany
    {
        return $this->hasMany(Mentorship::class, 'mentor_id');
    }

    public function mentoredBy(): HasMany
    {
        return $this->hasMany(Mentorship::class, 'mentee_id');
    }

    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'follower_id')
            ->withTimestamps();
    }

    public function following(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'following_id')
            ->withTimestamps();
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function spotlights(): HasMany
    {
        return $this->hasMany(Spotlight::class);
    }

    public function showcases(): HasMany
    {
        return $this->hasMany(Showcase::class);
    }

    public function jobPosts(): HasMany
    {
        return $this->hasMany(Job::class);
    }

    public function jobApplications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }

    public function activities(): HasMany
    {
        return $this->hasMany(ActivityLog::class);
    }

    // Helper Methods
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isTeacher(): bool
    {
        return $this->role === 'teacher';
    }

    public function isStudent(): bool
    {
        return $this->role === 'student';
    }

    public function isAlumni(): bool
    {
        return $this->role === 'alumni';
    }

    public function addPoints(int $points): void
    {
        $this->increment('points', $points);
    }

    public function isFollowing(User $user): bool
    {
        return $this->following()->where('following_id', $user->id)->exists();
    }

    public function follow(User $user): void
    {
        if (!$this->isFollowing($user)) {
            $this->following()->attach($user->id);
        }
    }

    public function unfollow(User $user): void
    {
        $this->following()->detach($user->id);
    }
}