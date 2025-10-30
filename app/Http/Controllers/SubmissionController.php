<?php

/**
 * CONTROLLERS FOR EDUMARK PLATFORM - PART 3
 * Place in app/Http/Controllers/
 */

namespace App\Http\Controllers;


// 11. SubmissionController.php
class SubmissionController extends Controller
{
    public function index(): View
    {
        // For teachers to view all submissions
        $this->authorize('viewAny', Submission::class);

        $submissions = Submission::with(['assignment', 'user'])
            ->where('status', 'submitted')
            ->latest()
            ->paginate(20);

        return view('submissions.index', compact('submissions'));
    }

    public function show(Submission $submission): View
    {
        $this->authorize('view', $submission);

        $submission->load(['assignment', 'user', 'gradedBy']);

        return view('submissions.show', compact('submission'));
    }

    public function store(Request $request, Assignment $assignment): RedirectResponse
    {
        $validated = $request->validate([
            'content' => 'nullable|string',
            'file' => 'nullable|file|max:5120',
        ]);

        // Check if user already has a submission
        $submission = $assignment->submissions()
            ->where('user_id', auth()->id())
            ->first();

        if (!$submission) {
            $submission = new Submission([
                'assignment_id' => $assignment->id,
                'user_id' => auth()->id(),
            ]);
        }

        $filePath = $submission->file_path;
        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($filePath) {
                Storage::disk('public')->delete($filePath);
            }
            $filePath = $request->file('file')->store('submissions', 'public');
        }

        $submission->fill([
            'content' => $validated['content'] ?? null,
            'file_path' => $filePath,
            'status' => 'submitted',
            'submitted_at' => now(),
        ]);

        $submission->save();

        // Log activity
        \App\Models\ActivityLog::log(
            auth()->user(),
            'assignment.submitted',
            $assignment,
            ['assignment_title' => $assignment->title],
            10
        );

        return back()->with('success', 'Assignment submitted successfully!');
    }

    public function grade(Request $request, Submission $submission): RedirectResponse
    {
        $this->authorize('grade', $submission);

        $validated = $request->validate([
            'points' => 'required|integer|min:0|max:' . $submission->assignment->max_points,
            'feedback' => 'nullable|string',
        ]);

        $submission->update([
            'points' => $validated['points'],
            'feedback' => $validated['feedback'] ?? null,
            'status' => 'graded',
            'graded_at' => now(),
            'graded_by' => auth()->id(),
        ]);

        // Award points to student
        $submission->user->addPoints($validated['points']);

        return back()->with('success', 'Submission graded successfully!');
    }
}