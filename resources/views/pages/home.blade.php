@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<div class="space-y-8">
    <!-- Welcome Header -->
    <div class="relative bg-primary rounded-lg shadow-card overflow-hidden">
        <div class="absolute inset-0">
             <div class="header-shape header-shape-1"></div>
             <div class="header-shape header-shape-2"></div>
             <div class="header-shape header-shape-3"></div>
        </div>
        <div class="relative p-8 grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
            <div class="text-white">
                <h1 class="text-4xl font-bold">Welcome back, Jessica!</h1>
                <p class="mt-4 text-lg text-indigo-100">You have 3 new notifications and 1 upcoming event. Keep up the great work!</p>
                <div class="mt-6">
                    <a href="#" class="btn bg-white text-primary hover:bg-indigo-50">View My Progress</a>
                </div>
            </div>
            <div class="hidden lg:block">
                <img src="{{ asset('assets/images/welcome-laptop.png') }}" alt="Laptop illustration" class="w-full max-w-sm mx-auto">
            </div>
        </div>
    </div>

    <!-- Quick Info Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-surface rounded-lg shadow-card p-6">
            <h3 class="font-bold text-lg text-copy">My Cohorts</h3>
            <p class="text-sm text-copy-lightest mt-1">You are a member of 3 cohorts.</p>
            <div class="flex -space-x-2 mt-4">
                <img class="inline-block h-10 w-10 rounded-full ring-2 ring-white" src="{{ asset('assets/images/cohort-growth-marketing.png') }}" alt="Growth Marketing">
                <img class="inline-block h-10 w-10 rounded-full ring-2 ring-white" src="{{ asset('assets/images/cohort-advanced-seo.png') }}" alt="Advanced SEO">
                <img class="inline-block h-10 w-10 rounded-full ring-2 ring-white" src="{{ asset('assets/images/cohort-video-marketing.png') }}" alt="Video Marketing">
            </div>
        </div>
        <div class="bg-surface rounded-lg shadow-card p-6">
            <h3 class="font-bold text-lg text-copy">Next Event</h3>
            <p class="text-sm text-copy-lightest mt-1">Webinar: Mastering YouTube</p>
            <div class="mt-4">
                <span class="tag bg-primary-50 text-primary-800">June 25, 2024</span>
                <p class="text-sm text-copy-light mt-2">Join us to learn about growing your brand on YouTube.</p>
            </div>
        </div>
        <div class="bg-surface rounded-lg shadow-card p-6">
            <h3 class="font-bold text-lg text-copy">Community Stats</h3>
            <p class="text-sm text-copy-lightest mt-1">See what's happening.</p>
            <ul class="mt-3 space-y-2 text-sm">
                <li class="flex justify-between">
                    <span class="text-copy-light">New Posts Today:</span>
                    <span class="font-semibold text-copy">28</span>
                </li>
                <li class="flex justify-between">
                    <span class="text-copy-light">New Members This Week:</span>
                    <span class="font-semibold text-copy">15</span>
                </li>
            </ul>
        </div>
    </div>

    <!-- Continue Learning -->
    <div>
        <h2 class="text-xl font-bold text-copy mb-4">Continue Learning</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $learning = [
                ['name' => 'Growth Marketing', 'progress' => 75, 'image' => 'cohort-growth-marketing.png', 'slug' => 'growth-marketing'],
                ['name' => 'Advanced SEO', 'progress' => 40, 'image' => 'cohort-advanced-seo.png', 'slug' => 'advanced-seo'],
            ];
            @endphp
            @foreach ($learning as $item)
            <div class="bg-surface rounded-lg shadow-card p-5">
                <div class="flex items-center gap-4">
                    <img class="h-14 w-14 rounded-lg object-cover" src="{{ asset('assets/images/' . $item['image']) }}" alt="{{ $item['name'] }}">
                    <div class="flex-grow">
                        <a href="{{ route('cohorts.show', ['slug' => $item['slug']]) }}" class="font-bold text-copy hover:text-primary">{{ $item['name'] }}</a>
                        <div class="mt-2">
                            <div class="flex justify-between text-sm text-copy-lightest mb-1">
                                <span>Progress</span>
                                <span>{{ $item['progress'] }}%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-1.5">
                                <div class="bg-primary h-1.5 rounded-full" style="width: {{ $item['progress'] }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <a href="{{ route('cohorts.index') }}" class="bg-gray-50 hover:bg-gray-100 border-2 border-dashed border-gray-300 rounded-lg flex flex-col items-center justify-center text-center p-5 transition-colors">
                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-sm">
                    <svg class="w-6 h-6 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </div>
                <p class="mt-3 font-semibold text-copy">Explore New Cohorts</p>
                <p class="text-sm text-copy-lightest mt-1">Expand your skills and join a new learning journey.</p>
            </a>
        </div>
    </div>
</div>
@endsection
