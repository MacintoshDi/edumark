@extends('layouts.app')

@section('title', 'Careers')

@section('content')
<div class="space-y-8">
    <!-- Header -->
    <div class="bg-surface rounded-lg shadow-card p-6">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-copy">Careers</h1>
                <p class="mt-1 text-copy-light">Find your next opportunity and join our talented community.</p>
            </div>
             <div class="flex items-center gap-2">
                <button class="btn-secondary">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                    </svg>
                    <span>Filter</span>
                </button>
                <button class="btn-primary">Post a Job</button>
            </div>
        </div>
    </div>

    <!-- Jobs List -->
    <div class="bg-surface rounded-lg shadow-card">
        <ul role="list" class="divide-y divide-border-color">
            @forelse ($jobs as $job)
                <x-job-listing :job="$job" />
            @empty
                <li class="p-6 text-center text-copy-light">
                    No open positions at the moment.
                </li>
            @endforelse
        </ul>
    </div>
</div>
@endsection