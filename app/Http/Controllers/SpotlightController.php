<?php

/**
 * CONTROLLERS FOR EDUMARK PLATFORM - PART 3
 * Place in app/Http/Controllers/
 */

namespace App\Http\Controllers;


// 14. SpotlightController.php
class SpotlightController extends Controller
{
    public function index(): View
    {
        $spotlights = Spotlight::published()
            ->with('user')
            ->latest('published_at')
            ->paginate(12);

        return view('spotlight.index', compact('spotlights'));
    }

    public function show(Spotlight $spotlight): View
    {
        if (!$spotlight->is_published && $spotlight->user_id !== auth()->id()) {
            abort(404);
        }

        $spotlight->load('user');

        return view('spotlight.show', compact('spotlight'));
    }
}