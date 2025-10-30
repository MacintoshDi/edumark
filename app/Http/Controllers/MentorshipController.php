<?php

/**
 * CONTROLLERS FOR EDUMARK PLATFORM - PART 3
 * Place in app/Http/Controllers/
 */

namespace App\Http\Controllers;


// 13. MentorshipController.php
class MentorshipController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();

        $asMentor = $user->mentorships()->with('mentee')->get();
        $asMentee = $user->mentoredBy()->with('mentor')->get();
        $pending = Mentorship::where('mentor_id', $user->id)
            ->where('status', 'pending')
            ->with('mentee')
            ->get();

        return view('mentorship.index', compact('asMentor', 'asMentee', 'pending'));
    }

    public function request(Request $request, User $user): RedirectResponse
    {
        if (!$user->is_mentor) {
            return back()->with('error', 'This user is not available as a mentor.');
        }

        $validated = $request->validate([
            'reason' => 'required|string|max:500',
            'goals' => 'nullable|array',
        ]);

        Mentorship::create([
            'mentor_id' => $user->id,
            'mentee_id' => auth()->id(),
            'reason' => $validated['reason'],
            'goals' => $validated['goals'] ?? null,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Mentorship request sent!');
    }

    public function accept(Mentorship $mentorship): RedirectResponse
    {
        if ($mentorship->mentor_id !== auth()->id()) {
            abort(403);
        }

        $mentorship->update([
            'status' => 'active',
            'start_date' => now(),
        ]);

        return back()->with('success', 'Mentorship accepted!');
    }

    public function decline(Mentorship $mentorship): RedirectResponse
    {
        if ($mentorship->mentor_id !== auth()->id()) {
            abort(403);
        }

        $mentorship->update(['status' => 'cancelled']);

        return back()->with('success', 'Mentorship declined.');
    }

    public function complete(Mentorship $mentorship): RedirectResponse
    {
        if ($mentorship->mentor_id !== auth()->id() && $mentorship->mentee_id !== auth()->id()) {
            abort(403);
        }

        $mentorship->update([
            'status' => 'completed',
            'end_date' => now(),
        ]);

        return back()->with('success', 'Mentorship marked as completed!');
    }
}