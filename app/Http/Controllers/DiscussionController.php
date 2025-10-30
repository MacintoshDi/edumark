<?php

/**
 * CONTROLLERS FOR EDUMARK PLATFORM - PART 1
 * Place in app/Http/Controllers/
 */

namespace App\Http\Controllers;


// 3. DiscussionController.php
use App\Models\Discussion;
use App\Models\Like;
use Illuminate\Support\Facades\Validator;

class DiscussionController extends Controller
{
    public function index(Request $request): View
    {
        $query = Discussion::with(['user', 'cohort', 'category', 'replies'])
            ->latest();

        // Filter by cohort
        if ($request->has('cohort')) {
            $query->where('cohort_id', $request->cohort);
        }

        // Filter by type
        if ($request->has('type')) {
            $query->where('type', $request->type);
        }

        // Search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $discussions = $query->paginate(20);

        $cohorts = Cohort::where('status', 'active')->get();

        return view('discussions.index', compact('discussions', 'cohorts'));
    }

    public function askTeacher(): View
    {
        $questions = Discussion::with(['user', 'cohort', 'replies'])
            ->where('type', 'question')
            ->latest()
            ->paginate(20);

        return view('discussions.ask-teacher', compact('questions'));
    }

    public function create(): View
    {
        $cohorts = auth()->user()->cohorts;
        $categories = \App\Models\Category::where('is_active', true)->get();

        return view('discussions.create', compact('cohorts', 'categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'type' => 'required|in:general,question,announcement',
            'cohort_id' => 'nullable|exists:cohorts,id',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $discussion = auth()->user()->discussions()->create($validated);

        // Log activity
        \App\Models\ActivityLog::log(
            auth()->user(),
            'discussion.created',
            $discussion,
            ['title' => $discussion->title],
            5
        );

        return redirect()->route('discussions.show', $discussion)
            ->with('success', 'Discussion created successfully!');
    }

    public function show(Discussion $discussion): View
    {
        $discussion->load(['user', 'cohort', 'category', 'likes']);
        $discussion->incrementViews();

        $replies = $discussion->replies()
            ->with(['user', 'children.user', 'likes'])
            ->whereNull('parent_id')
            ->latest()
            ->get();

        return view('discussions.show', compact('discussion', 'replies'));
    }

    public function edit(Discussion $discussion): View
    {
        $this->authorize('update', $discussion);

        $cohorts = auth()->user()->cohorts;
        $categories = \App\Models\Category::where('is_active', true)->get();

        return view('discussions.edit', compact('discussion', 'cohorts', 'categories'));
    }

    public function update(Request $request, Discussion $discussion): RedirectResponse
    {
        $this->authorize('update', $discussion);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'type' => 'required|in:general,question,announcement',
            'cohort_id' => 'nullable|exists:cohorts,id',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $discussion->update($validated);

        return redirect()->route('discussions.show', $discussion)
            ->with('success', 'Discussion updated successfully!');
    }

    public function destroy(Discussion $discussion): RedirectResponse
    {
        $this->authorize('delete', $discussion);

        $discussion->delete();

        return redirect()->route('discussions.index')
            ->with('success', 'Discussion deleted successfully!');
    }

    public function like(Discussion $discussion): RedirectResponse
    {
        $user = auth()->user();

        $existingLike = $discussion->likes()->where('user_id', $user->id)->first();

        if ($existingLike) {
            $existingLike->delete();
            $message = 'Like removed';
        } else {
            Like::create([
                'user_id' => $user->id,
                'likeable_id' => $discussion->id,
                'likeable_type' => Discussion::class,
            ]);
            $message = 'Discussion liked!';

            // Award points to discussion author
            if ($discussion->user_id !== $user->id) {
                $discussion->user->addPoints(2);
            }
        }

        return back()->with('success', $message);
    }
}