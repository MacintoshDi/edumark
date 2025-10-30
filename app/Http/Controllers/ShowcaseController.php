<?php

/**
 * CONTROLLERS FOR EDUMARK PLATFORM - PART 3
 * Place in app/Http/Controllers/
 */

namespace App\Http\Controllers;



// 15. ShowcaseController.php
class ShowcaseController extends Controller
{
    public function index(): View
    {
        $showcases = Showcase::with('user')
            ->latest()
            ->paginate(12);

        $featured = Showcase::featured()
            ->with('user')
            ->take(3)
            ->get();

        return view('showcase.index', compact('showcases', 'featured'));
    }

    public function create(): View
    {
        return view('showcase.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'project_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'thumbnail' => 'nullable|image|max:2048',
            'technologies' => 'nullable|array',
        ]);

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('showcases', 'public');
        }

        auth()->user()->showcases()->create([
            ...$validated,
            'thumbnail' => $thumbnailPath,
        ]);

        return redirect()->route('showcase')
            ->with('success', 'Showcase created successfully!');
    }

    public function show(Showcase $showcase): View
    {
        $showcase->load('user');

        return view('showcase.show', compact('showcase'));
    }

    public function edit(Showcase $showcase): View
    {
        $this->authorize('update', $showcase);

        return view('showcase.edit', compact('showcase'));
    }

    public function update(Request $request, Showcase $showcase): RedirectResponse
    {
        $this->authorize('update', $showcase);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'project_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'thumbnail' => 'nullable|image|max:2048',
            'technologies' => 'nullable|array',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($showcase->thumbnail) {
                Storage::disk('public')->delete($showcase->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('showcases', 'public');
        }

        $showcase->update($validated);

        return redirect()->route('showcase.show', $showcase)
            ->with('success', 'Showcase updated successfully!');
    }

    public function destroy(Showcase $showcase): RedirectResponse
    {
        $this->authorize('delete', $showcase);

        if ($showcase->thumbnail) {
            Storage::disk('public')->delete($showcase->thumbnail);
        }

        $showcase->delete();

        return redirect()->route('showcase')
            ->with('success', 'Showcase deleted successfully!');
    }
}