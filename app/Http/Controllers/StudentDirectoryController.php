<?php

/**
 * CONTROLLERS FOR EDUMARK PLATFORM - PART 2
 * Place in app/Http/Controllers/
 */

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

// 7. StudentDirectoryController.php
class StudentDirectoryController extends Controller
{
    public function index(Request $request): View
    {
        $query = User::where('is_active', true)
            ->where('id', '!=', auth()->id());

        // Filter by role
        if ($request->has('role')) {
            $query->where('role', $request->role);
        }

        // Filter by mentors
        if ($request->has('mentors') && $request->mentors === '1') {
            $query->where('is_mentor', true);
        }

        // Search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('bio', 'like', "%{$search}%")
                    ->orWhere('interests', 'like', "%{$search}%");
            });
        }

        $users = $query->withCount(['followers', 'following', 'cohorts'])
            ->paginate(24);

        return view('student-directory.index', compact('users'));
    }

    public function show(User $user): View
    {
        $user->load([
            'cohorts',
            'discussions',
            'showcases',
            'badges',
            'followers',
            'following'
        ]);

        $isFollowing = auth()->user()->isFollowing($user);

        $recentActivity = $user->activities()
            ->with('subject')
            ->latest()
            ->take(10)
            ->get();

        return view('student-directory.show', compact('user', 'isFollowing', 'recentActivity'));
    }

    public function follow(User $user): RedirectResponse
    {
        if (auth()->id() === $user->id) {
            return back()->with('error', 'You cannot follow yourself.');
        }

        auth()->user()->follow($user);

        // Log activity
        \App\Models\ActivityLog::log(
            auth()->user(),
            'user.followed',
            $user,
            ['followed_user' => $user->name],
            2
        );

        return back()->with('success', 'Now following ' . $user->name);
    }

    public function unfollow(User $user): RedirectResponse
    {
        auth()->user()->unfollow($user);

        return back()->with('success', 'Unfollowed ' . $user->name);
    }
}