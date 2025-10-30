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

// 5. EventController.php
class EventController extends Controller
{
    public function index(Request $request): View
    {
        $query = Event::with(['user', 'cohort', 'attendees']);

        // Filter by type
        if ($request->has('type')) {
            $query->where('type', $request->type);
        }

        // Filter by time
        if ($request->has('time')) {
            switch ($request->time) {
                case 'upcoming':
                    $query->where('start_time', '>', now());
                    break;
                case 'past':
                    $query->where('end_time', '<', now());
                    break;
                case 'ongoing':
                    $query->where('start_time', '<=', now())
                          ->where('end_time', '>=', now());
                    break;
            }
        } else {
            // Default: show upcoming events
            $query->where('start_time', '>', now());
        }

        $events = $query->orderBy('start_time')->paginate(12);

        return view('events.index', compact('events'));
    }

    public function show(Event $event): View
    {
        $event->load(['user', 'cohort', 'attendees']);

        $isRegistered = $event->isUserRegistered(auth()->user());

        return view('events.show', compact('event', 'isRegistered'));
    }

    public function register(Event $event): RedirectResponse
    {
        $user = auth()->user();

        if ($event->isUserRegistered($user)) {
            return back()->with('error', 'You are already registered for this event.');
        }

        if ($event->isFull()) {
            return back()->with('error', 'This event is full.');
        }

        if ($event->isPast()) {
            return back()->with('error', 'This event has already passed.');
        }

        $event->attendees()->attach($user->id, [
            'status' => 'registered',
            'registered_at' => now(),
        ]);

        // Log activity
        \App\Models\ActivityLog::log(
            $user,
            'event.registered',
            $event,
            ['event_title' => $event->title],
            5
        );

        return back()->with('success', 'Successfully registered for ' . $event->title);
    }

    public function cancel(Event $event): RedirectResponse
    {
        $user = auth()->user();

        if (!$event->isUserRegistered($user)) {
            return back()->with('error', 'You are not registered for this event.');
        }

        $event->attendees()->updateExistingPivot($user->id, [
            'status' => 'cancelled',
        ]);

        return back()->with('success', 'Registration cancelled for ' . $event->title);
    }
}