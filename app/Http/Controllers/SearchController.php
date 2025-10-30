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

// 8. SearchController.php
class SearchController extends Controller
{
    public function index(Request $request): View
    {
        $query = $request->get('q');
        
        if (empty($query)) {
            return view('search.index', [
                'query' => '',
                'cohorts' => collect(),
                'discussions' => collect(),
                'users' => collect(),
                'events' => collect(),
            ]);
        }

        // Search cohorts
        $cohorts = \App\Models\Cohort::where('status', 'published')
            ->orWhere('status', 'active')
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                    ->orWhere('description', 'like', "%{$query}%");
            })
            ->take(5)
            ->get();

        // Search discussions
        $discussions = \App\Models\Discussion::where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                    ->orWhere('content', 'like', "%{$query}%");
            })
            ->with('user')
            ->take(5)
            ->get();

        // Search users
        $users = User::where('is_active', true)
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                    ->orWhere('bio', 'like', "%{$query}%");
            })
            ->take(5)
            ->get();

        // Search events
        $events = \App\Models\Event::where('start_time', '>', now())
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                    ->orWhere('description', 'like', "%{$query}%");
            })
            ->take(5)
            ->get();

        return view('search.index', compact('query', 'cohorts', 'discussions', 'users', 'events'));
    }
}