<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    /**
     * Redirect to Facebook OAuth page
     */
    public function redirectToFacebook(): RedirectResponse
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Handle Facebook OAuth callback
     */
    public function handleFacebookCallback(): RedirectResponse
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();
            
            // Find or create user
            $user = $this->findOrCreateUser($facebookUser, 'facebook');
            
            // Login user
            Auth::login($user, true);
            
            return redirect()->intended('/');
            
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Failed to login with Facebook. Please try again.');
        }
    }

    /**
     * Redirect to Google OAuth page
     */
    public function redirectToGoogle(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle Google OAuth callback
     */
    public function handleGoogleCallback(): RedirectResponse
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            // Find or create user
            $user = $this->findOrCreateUser($googleUser, 'google');
            
            // Login user
            Auth::login($user, true);
            
            return redirect()->intended('/');
            
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Failed to login with Google. Please try again.');
        }
    }

    /**
     * Find or create user from OAuth provider
     */
    protected function findOrCreateUser($providerUser, string $provider): User
    {
        // Check if user exists by provider ID
        $providerIdField = $provider . '_id';
        $user = User::where($providerIdField, $providerUser->getId())->first();

        if ($user) {
            // Update user info if needed
            $this->updateUserFromProvider($user, $providerUser, $provider);
            return $user;
        }

        // Check if user exists by email
        $user = User::where('email', $providerUser->getEmail())->first();

        if ($user) {
            // Link OAuth account to existing user
            $user->update([
                $providerIdField => $providerUser->getId(),
                'provider' => $provider,
                'provider_id' => $providerUser->getId(),
            ]);
            
            $this->updateUserFromProvider($user, $providerUser, $provider);
            return $user;
        }

        // Create new user
        return $this->createUserFromProvider($providerUser, $provider);
    }

    /**
     * Create new user from OAuth provider
     */
    protected function createUserFromProvider($providerUser, string $provider): User
    {
        // Split name into first_name and last_name
        $nameParts = explode(' ', $providerUser->getName(), 2);
        $firstName = $nameParts[0] ?? '';
        $lastName = $nameParts[1] ?? '';

        return User::create([
            'name' => $providerUser->getName(),
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $providerUser->getEmail(),
            'avatar' => $providerUser->getAvatar(),
            'password' => Hash::make(Str::random(24)), // Random password
            'email_verified_at' => now(), // Auto-verify OAuth users
            'role' => 'student', // Default role
            'is_active' => true,
            $provider . '_id' => $providerUser->getId(),
            'provider' => $provider,
            'provider_id' => $providerUser->getId(),
        ]);
    }

    /**
     * Update user info from OAuth provider
     */
    protected function updateUserFromProvider(User $user, $providerUser, string $provider): void
    {
        $updates = [];

        // Update avatar if not set
        if (!$user->avatar && $providerUser->getAvatar()) {
            $updates['avatar'] = $providerUser->getAvatar();
        }

        // Update name if not set
        if (!$user->first_name && $providerUser->getName()) {
            $nameParts = explode(' ', $providerUser->getName(), 2);
            $updates['first_name'] = $nameParts[0] ?? '';
            $updates['last_name'] = $nameParts[1] ?? '';
        }

        // Update email verified
        if (!$user->email_verified_at) {
            $updates['email_verified_at'] = now();
        }

        if (!empty($updates)) {
            $user->update($updates);
        }
    }
}