@extends('layouts.app')

@section('title', 'Ask Your Teacher')

@section('content')
<div class="space-y-8">
    <!-- Header -->
    <div class="bg-surface rounded-lg shadow-card p-6">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-copy">Ask Your Teacher</h1>
                <p class="mt-1 text-copy-light">Get help and guidance from our expert instructors.</p>
            </div>
            <div class="flex items-center gap-2">
                <button class="btn-secondary">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                    </svg>
                    <span>Filter</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Teachers Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @php
            $teachers = [
                ['name' => 'David Anderson', 'role' => 'Marketing Expert', 'avatar' => 'david-anderson.jpg'],
                ['name' => 'Emily Davis', 'role' => 'SEO Specialist', 'avatar' => 'emily-davis.jpg'],
                ['name' => 'Chris Lee', 'role' => 'Content Strategist', 'avatar' => 'chris-lee.jpg'],
                ['name' => 'Sarah Miller', 'role' => 'Video Production', 'avatar' => 'sarah-miller.jpg'],
            ];
        @endphp

        @foreach ($teachers as $teacher)
        <div class="bg-surface rounded-lg shadow-card text-center p-6">
            <img class="w-24 h-24 rounded-full mx-auto object-cover" src="{{ asset('assets/images/avatars/' . $teacher['avatar']) }}" alt="{{ $teacher['name'] }}">
            <h3 class="mt-4 text-lg font-semibold text-copy">{{ $teacher['name'] }}</h3>
            <p class="mt-1 text-sm text-copy-lightest">{{ $teacher['role'] }}</p>
            <div class="mt-4">
                <a href="mailto:{{ strtolower(str_replace(' ', '.', $teacher['name'])) }}@edumark.com" class="btn-primary w-full text-sm">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                       <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                    </svg>
                    <span>Contact</span>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection