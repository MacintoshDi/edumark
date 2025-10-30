<?php

/**
 * CONTROLLERS FOR EDUMARK PLATFORM - PART 3
 * Place in app/Http/Controllers/
 */

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Models\Assignment;
use App\Models\Submission;
use App\Models\Cohort;
use App\Models\Message;
use App\Models\Mentorship;
use App\Models\Spotlight;
use App\Models\Showcase;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

// 9. ResourceController.php
class ResourceController extends Controller
{
    public function index(Cohort $cohort): View
    {
        $resources = $cohort->resources()
            ->with('user')
            ->orderBy('order')
            ->get();

        return view('resources.index', compact('cohort', 'resources'));
    }

    public function store(Request $request, Cohort $cohort): RedirectResponse
    {
        $this->authorize('create', Resource::class);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:file,link,video,document',
            'url' => 'required_if:type,link,video|url|nullable',
            'file' => 'required_if:type,file,document|file|max:10240|nullable',
            'order' => 'integer|min:0',
        ]);

        $filePath = null;
        $size = null;
        $mimeType = null;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('resources', 'public');
            $size = $file->getSize();
            $mimeType = $file->getMimeType();
        }

        $cohort->resources()->create([
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'type' => $validated['type'],
            'url' => $validated['url'] ?? null,
            'file_path' => $filePath,
            'size' => $size,
            'mime_type' => $mimeType,
            'order' => $validated['order'] ?? 0,
        ]);

        return back()->with('success', 'Resource added successfully!');
    }

    public function download(Resource $resource)
    {
        if (!$resource->file_path) {
            abort(404);
        }

        $resource->incrementDownloads();

        return Storage::disk('public')->download($resource->file_path, $resource->title);
    }

    public function destroy(Resource $resource): RedirectResponse
    {
        $this->authorize('delete', $resource);

        if ($resource->file_path) {
            Storage::disk('public')->delete($resource->file_path);
        }

        $resource->delete();

        return back()->with('success', 'Resource deleted successfully!');
    }
}