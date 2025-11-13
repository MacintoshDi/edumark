<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'specialty',
        'company',
        'position',
        'website',
        'github',
        'linkedin',
        'twitter',
        'skills',
        'interests',
        'languages',
        'education',
        'experience_years',
        'timezone',
        'availability',
        'meta',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'skills' => 'array',
        'interests' => 'array',
        'languages' => 'array',
        'education' => 'array',
        'experience_years' => 'integer',
        'meta' => 'array',
    ];

    // ==========================================
    // RELATIONSHIPS
    // ==========================================

    /**
     * Get the user that owns the profile.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // ==========================================
    // ACCESSORS
    // ==========================================

    /**
     * Get formatted specialty with fallback.
     */
    public function getFormattedSpecialtyAttribute(): string
    {
        return $this->specialty ?? 'Not specified';
    }

    /**
     * Get full professional title.
     */
    public function getFullTitleAttribute(): string
    {
        $parts = array_filter([
            $this->position,
            $this->company,
        ]);

        return implode(' at ', $parts) ?: 'No position specified';
    }

    /**
     * Get social links array.
     */
    public function getSocialLinksAttribute(): array
    {
        return array_filter([
            'github' => $this->github,
            'linkedin' => $this->linkedin,
            'twitter' => $this->twitter,
            'website' => $this->website,
        ]);
    }

    // ==========================================
    // HELPER METHODS
    // ==========================================

    /**
     * Check if profile is complete.
     */
    public function isComplete(): bool
    {
        return !empty($this->specialty) 
            && !empty($this->company) 
            && !empty($this->position);
    }

    /**
     * Get completion percentage.
     */
    public function getCompletionPercentage(): int
    {
        $fields = [
            'specialty',
            'company',
            'position',
            'website',
            'skills',
            'interests',
            'education',
        ];

        $filled = 0;
        $total = count($fields);

        foreach ($fields as $field) {
            if (!empty($this->$field)) {
                $filled++;
            }
        }

        return round(($filled / $total) * 100);
    }

    /**
     * Check if has social links.
     */
    public function hasSocialLinks(): bool
    {
        return !empty($this->social_links);
    }

    /**
     * Get display specialty.
     */
    public function getDisplaySpecialty(): string
    {
        return $this->specialty ?: 'General';
    }

    // ==========================================
    // SCOPES
    // ==========================================

    /**
     * Scope to filter by specialty.
     */
    public function scopeSpecialty($query, string $specialty)
    {
        return $query->where('specialty', 'like', "%{$specialty}%");
    }

    /**
     * Scope to filter by skill.
     */
    public function scopeHasSkill($query, string $skill)
    {
        return $query->whereJsonContains('skills', $skill);
    }

    /**
     * Scope to filter by interest.
     */
    public function scopeHasInterest($query, string $interest)
    {
        return $query->whereJsonContains('interests', $interest);
    }

    /**
     * Scope to search profiles.
     */
    public function scopeSearch($query, string $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('specialty', 'like', "%{$search}%")
                ->orWhere('company', 'like', "%{$search}%")
                ->orWhere('position', 'like', "%{$search}%");
        });
    }

    /**
     * Scope to get complete profiles.
     */
    public function scopeComplete($query)
    {
        return $query->whereNotNull('specialty')
            ->whereNotNull('company')
            ->whereNotNull('position');
    }
}