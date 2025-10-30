<?php

/**
 * CONTROLLERS FOR EDUMARK PLATFORM - PART 3
 * Place in app/Http/Controllers/
 */

namespace App\Http\Controllers;


// 10. AssignmentController.php
class AssignmentController extends Controller
{
    public function index(Cohort $cohort): View
    {
        $assignments = $cohort->assignments()
            ->with('user')
            ->orderBy('order')
            ->get();

        return view('assignments.index', compact('cohort', 'assignments'));
    }

    public function show(Assignment $assignment): View
    {
        $assignment->load(['cohort', 'user', 'submissions']);

        $userSubmission = null;
        if (auth()->check()) {
            $userSubmission = $assignment->submissions()
                ->where('user_id', auth()->id())
                ->first();
        }

        return view('assignments.show', compact('assignment', 'userSubmission'));
    }

    public function store(Request $request, Cohort $cohort): RedirectResponse
    {
        $this->authorize('create', Assignment::class);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'instructions' => 'nullable|string',
            'max_points' => 'required|integer|min:1',
            'due_date' => 'nullable|date|after:today',
            'allow_late_submission' => 'boolean',
            'order' => 'integer|min:0',
        ]);

        $cohort->assignments()->create([
            'user_id' => auth()->id(),
            ...$validated,
        ]);

        return back()->with('success', 'Assignment created successfully!');
    }

    public function update(Request $request, Assignment $assignment): RedirectResponse
    {
        $this->authorize('update', $assignment);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'instructions' => 'nullable|string',
            'max_points' => 'required|integer|min:1',
            'due_date' => 'nullable|date',
            'allow_late_submission' => 'boolean',
            'order' => 'integer|min:0',
        ]);

        $assignment->update($validated);

        return back()->with('success', 'Assignment updated successfully!');
    }

    public function destroy(Assignment $assignment): RedirectResponse
    {
        $this->authorize('delete', $assignment);

        $assignment->delete();

        return back()->with('success', 'Assignment deleted successfully!');
    }
}