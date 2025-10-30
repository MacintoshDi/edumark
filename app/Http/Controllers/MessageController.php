<?php

/**
 * CONTROLLERS FOR EDUMARK PLATFORM - PART 3
 * Place in app/Http/Controllers/
 */

namespace App\Http\Controllers;


// 12. MessageController.php
class MessageController extends Controller
{
    public function index(): View
    {
        $conversations = Message::where('sender_id', auth()->id())
            ->orWhere('recipient_id', auth()->id())
            ->with(['sender', 'recipient'])
            ->latest()
            ->get()
            ->groupBy(function ($message) {
                $otherId = $message->sender_id === auth()->id() 
                    ? $message->recipient_id 
                    : $message->sender_id;
                return $otherId;
            });

        return view('messages.index', compact('conversations'));
    }

    public function conversation(User $user): View
    {
        $messages = Message::betweenUsers(auth()->user(), $user)
            ->with(['sender', 'recipient'])
            ->orderBy('created_at')
            ->get();

        // Mark messages as read
        Message::where('recipient_id', auth()->id())
            ->where('sender_id', $user->id)
            ->unread()
            ->update(['is_read' => true, 'read_at' => now()]);

        return view('messages.conversation', compact('user', 'messages'));
    }

    public function send(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        Message::create([
            'sender_id' => auth()->id(),
            'recipient_id' => $user->id,
            'content' => $validated['content'],
        ]);

        return back()->with('success', 'Message sent!');
    }

    public function markAsRead(Message $message): RedirectResponse
    {
        if ($message->recipient_id !== auth()->id()) {
            abort(403);
        }

        $message->markAsRead();

        return back();
    }
}