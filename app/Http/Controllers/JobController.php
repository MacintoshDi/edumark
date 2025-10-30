<?php

/**
 * CONTROLLERS FOR EDUMARK PLATFORM - PART 2
 * Place in app/Http/Controllers/
 */

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;



// 6. JobController.php
class JobController extends Controller
{
    public function index(Request $request): View
    {
        $query = Job::with(['user', 'applications'])
            ->where('status', 'published');

        // Filter by type
        if ($request->has('type')) {
            $query->where('type', $request->type);
        }

        // Filter by remote
        if ($request->has('remote') && $request->remote === '1') {
            $query->where('is_remote', true);
        }

        // Search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('company', 'like', "%{$search}%");
            });
        }

        // Sort
        $sortBy = $request->get('sort', 'newest');
        switch ($sortBy) {
            case 'oldest':
                $query->oldest();
                break;
            case 'deadline':
                $query->orderBy('deadline');
                break;
            default:
                $query->latest();
        }

        $jobs = $query->paginate(15);

        return view('jobs.index', compact('jobs'));
    }

    public function create(): View
    {
        return view('jobs.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:full-time,part-time,contract,internship,freelance',
            'company' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'is_remote' => 'boolean',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|min:0',
            'salary_currency' => 'nullable|string|max:3',
            'skills_required' => 'nullable|array',
            'application_url' => 'nullable|url',
            'application_email' => 'nullable|email',
            'deadline' => 'nullable|date|after:today',
        ]);

        $validated['user_id'] = auth()->id();
        $validated['status'] = 'published';
        $validated['is_remote'] = $request->has('is_remote');

        $job = Job::create($validated);

        return redirect()->route('jobs.show', $job)
            ->with('success', 'Job posted successfully!');
    }

    public function show(Job $job): View
    {
        $job->incrementViews();
        $job->load(['user', 'applications']);

        $hasApplied = $job->hasUserApplied(auth()->user());

        $similarJobs = Job::where('status', 'published')
            ->where('id', '!=', $job->id)
            ->where(function ($query) use ($job) {
                $query->where('type', $job->type)
                      ->orWhere('company', $job->company);
            })
            ->take(3)
            ->get();

        return view('jobs.show', compact('job', 'hasApplied', 'similarJobs'));
    }

    public function apply(Request $request, Job $job): RedirectResponse
    {
        $user = auth()->user();

        if ($job->hasUserApplied($user)) {
            return back()->with('error', 'You have already applied to this job.');
        }

        if (!$job->isOpen()) {
            return back()->with('error', 'This job is no longer accepting applications.');
        }

        $validated = $request->validate([
            'cover_letter' => 'nullable|string',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $resumePath = null;
        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes', 'public');
        }

        JobApplication::create([
            'job_id' => $job->id,
            'user_id' => $user->id,
            'cover_letter' => $validated['cover_letter'] ?? null,
            'resume_path' => $resumePath,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Application submitted successfully!');
    }
}