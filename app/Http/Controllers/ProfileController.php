<?php

/**
 * CONTROLLERS FOR EDUMARK PLATFORM - PART 3
 * Place in app/Http/Controllers/
 */

namespace App\Http\Controllers;


// 16. ProfileController.php
class ProfileController extends Controller
{
    public function edit(): View
    {
        return view('profile.edit', ['user' => auth()->user()]);
    }

    public function update(Request $request): RedirectResponse
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'bio' => 'nullable|string|max:1000',
            'avatar' => 'nullable|image|max:2048',
            'interests' => 'nullable|array',
            'goals' => 'nullable|array',
            'linkedin' => 'nullable|url',
            'github' => 'nullable|url',
            'twitter' => 'nullable|url',
            'is_mentor' => 'boolean',
        ]);

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $validated['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $user->update($validated);

        return back()->with('success', 'Profile updated successfully!');
    }

    public function badges(): View
    {
        $user = auth()->user();
        $badges = $user->badges()->withPivot('earned_at')->get();

        return view('profile.badges', compact('user', 'badges'));
    }

    public function activity(): View
    {
        $activities = auth()->user()->activities()
            ->with('subject')
            ->latest()
            ->paginate(20);

        return view('profile.activity', compact('activities'));
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        auth()->logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}