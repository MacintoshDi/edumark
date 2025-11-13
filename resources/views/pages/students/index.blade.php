@extends('layouts.app')

@section('title', 'Student Directory')

@section('content')
<div class="space-y-8">
    <!-- Header -->
    <div class="relative bg-surface rounded-lg shadow-card p-8 overflow-hidden">
        <div class="absolute top-0 right-0 -mt-16 -mr-16 opacity-10">
            <img src="{{ asset('assets/images/directory-header-icon.png') }}" alt="" class="w-64 h-64">
        </div>
        <div class="relative">
            <h1 class="text-3xl font-bold text-copy">Student Directory</h1>
            <p class="mt-2 max-w-2xl text-copy-light">
                Connect with fellow learners, find collaborators for your projects, and grow your network. Our community is full of talented individuals from various marketing disciplines.
            </p>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-surface rounded-lg shadow-card p-4">
        <div class="flex flex-col sm:flex-row items-center gap-4">
            <div class="relative flex-grow w-full">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </div>
                <input type="text" placeholder="Search by name or skill..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:ring-primary focus:border-primary">
            </div>
            <div class="flex items-center gap-2 w-full sm:w-auto">
                <select class="border border-gray-300 rounded-md focus:ring-primary focus:border-primary w-full sm:w-48">
                    <option>All Cohorts</option>
                    <option>Growth Marketing</option>
                    <option>Advanced SEO</option>
                    <option>Video Marketing</option>
                    <option>Content Marketing</option>
                </select>
                <button class="btn-secondary">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                    </svg>
                    <span>Filter</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Student Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($students as $student)
            <x-student-card :student="$student" />
        @endforeach
    </div>
</div>
@endsection
