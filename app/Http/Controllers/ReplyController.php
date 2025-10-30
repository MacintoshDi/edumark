<?php

/**
 * CONTROLLERS FOR EDUMARK PLATFORM - PART 1
 * Place in app/Http/Controllers/
 */

namespace App\Http\Controllers;


// 4. ReplyController.php
use App\Models\Reply;

class ReplyController extends Controller
{
    public function store(Request $request, Discussion $discussion): RedirectResponse
    {
        $validated = $request->validate([
            'content' => 'required|string',
            'parent_id' => 'nullable|exists:replies,id',
        ]);

        $reply = $discussion->replies()->create([
            'user_id' => auth()->id(),
            'content' => $validated['content'],
            'parent_id' => $validated['parent_id'] ?? null,
        ]);

        // Log activity
        \App\Models\ActivityLog::log(
            auth()->user(),
            'discussion.replied',
            $discussion,
            ['discussion_title' => $discussion->title],
            3
        );

        return back()->with('success', 'Reply posted successfully!');
    }

    public function update(Request $request, Reply $reply): RedirectResponse
    {
        $this->authorize('update', $reply);

        $validated = $request->validate([
            'content' => 'required|string',
        ]);

        $reply->update($validated);

        return back()->with('success', 'Reply updated successfully!');
    }

    public function destroy(Reply $reply): RedirectResponse
    {
        $this->authorize('delete', $reply);

        $reply->delete();

        return back()->with('success', 'Reply deleted successfully!');
    }

    public function like(Reply $reply): RedirectResponse
    {
        $user = auth()->user();

        $existingLike = $reply->likes()->where('user_id', $user->id)->first();

        if ($existingLike) {
            $existingLike->delete();
            $message = 'Like removed';
        } else {
            Like::create([
                'user_id' => $user->id,
                'likeable_id' => $reply->id,
                'likeable_type' => Reply::class,
            ]);
            $message = 'Reply liked!';

            // Award points to reply author
            if ($reply->user_id !== $user->id) {
                $reply->user->addPoints(1);
            }
        }

        return back()->with('success', $message);
    }

    public function markSolution(Reply $reply): RedirectResponse
    {
        $discussion = $reply->discussion;

        // Only discussion author or teachers can mark solutions
        if (auth()->id() !== $discussion->user_id && !auth()->user()->isTeacher()) {
            abort(403);
        }

        // Unmark other solutions
        $discussion->replies()->update(['is_solution' => false]);

        // Mark this as solution
        $reply->update(['is_solution' => true]);

        // Award bonus points to reply author
        $reply->user->addPoints(10);

        return back()->with('success', 'Reply marked as solution!');
    }
}