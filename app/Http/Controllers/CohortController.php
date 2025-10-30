<?php

/**
 * CONTROLLERS FOR EDUMARK PLATFORM - PART 1
 * Place in app/Http/Controllers/
 */

namespace App\Http\Controllers;

// 2. CohortController.php
use App\Models\Cohort;
use App\Models\Assignment;
use App\Models\Resource;
use Illuminate\Http\RedirectResponse;

class CohortController extends Controller
{
    public function index(): View
    {
        $cohorts = Cohort::with(['category', 'students'])
            ->where(function ($query) {
                $query->where('status', 'published')
                    ->orWhere('status', 'active');
            })
            ->orderBy('start_date', 'desc')
            ->paginate(12);

        $categories = \App\Models\Category::whereNull('parent_id')
            ->with('children')
            ->get();

        return view('cohorts.index', compact('cohorts', 'categories'));
    }

    public function show(Cohort $cohort): View
    {
        $cohort->load(['category', 'students', 'teachers', 'discussions', 'events']);

        $isEnrolled = auth()->user()->cohorts->contains($cohort->id);

        $resources = $cohort->resources()
            ->orderBy('order')
            ->get();

        $assignments = $cohort->assignments()
            ->orderBy('order')
            ->get();

        $discussions = $cohort->discussions()
            ->with(['user', 'replies'])
            ->latest()
            ->take(10)
            ->get();

        $upcomingEvents = $cohort->events()
            ->where('start_time', '>', now())
            ->orderBy('start_time')
            ->get();

        return view('cohorts.show', compact(
            'cohort',
            'isEnrolled',
            'resources',
            'assignments',
            'discussions',
            'upcomingEvents'
        ));
    }

    public function enroll(Request $request, Cohort $cohort): RedirectResponse
    {
        $user = auth()->user();

        // Check if already enrolled
        if ($user->cohorts->contains($cohort->id)) {
            return back()->with('error', 'You are already enrolled in this cohort.');
        }

        // Check if cohort is full
        if ($cohort->isFull()) {
            return back()->with('error', 'This cohort is full.');
        }

        // Enroll user
        $user->cohorts()->attach($cohort->id, [
            'role' => 'student',
            'enrolled_at' => now(),
            'status' => 'enrolled',
            'progress' => 0,
        ]);

        // Log activity
        \App\Models\ActivityLog::log(
            $user,
            'cohort.enrolled',
            $cohort,
            ['cohort_name' => $cohort->name],
            10
        );

        return back()->with('success', 'Successfully enrolled in ' . $cohort->name);
    }

    public function leave(Cohort $cohort): RedirectResponse
    {
        $user = auth()->user();

        if (!$user->cohorts->contains($cohort->id)) {
            return back()->with('error', 'You are not enrolled in this cohort.');
        }

        $user->cohorts()->updateExistingPivot($cohort->id, [
            'status' => 'dropped',
        ]);

        return redirect()->route('cohorts.index')
            ->with('success', 'You have left ' . $cohort->name);
    }
}