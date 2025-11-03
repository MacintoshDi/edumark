@extends('layouts.app')

@section('title', 'Welcome to Learning Community')

@section('content')
<!-- Hero Section with Banner -->
<div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-indigo-700 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 text-center">
        <p class="text-sm font-medium flex items-center justify-center">
            <span class="inline-flex items-center">
                👋 Edumark Template, 
                <a href="https://www.figma.com" target="_blank" class="ml-2 underline hover:no-underline flex items-center">
                    👉 Download Design Assets Style Guide in Figma →
                </a>
            </span>
        </p>
    </div>
</div>

<!-- Main Hero -->
<div class="bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center max-w-3xl mx-auto">
            <h1 class="text-5xl md:text-6xl font-bold text-gray-900 leading-tight mb-6">
                Welcome to <span class="text-indigo-600">Edumark</span>
            </h1>
            <p class="text-xl text-gray-600 leading-relaxed mb-8">
                Join our thriving community of learners, mentors, and professionals. 
                Connect with peers, participate in discussions, and grow your skills together.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ route('register') }}" 
                   class="inline-flex items-center px-8 py-4 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    Get Started
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
                <a href="{{ route('cohorts.index') }}" 
                   class="inline-flex items-center px-8 py-4 bg-white text-indigo-600 font-semibold rounded-lg border-2 border-indigo-600 hover:bg-indigo-50 transition-all duration-200">
                    Browse Cohorts
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Featured Cohorts Section -->
<div class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                🎓 Featured Cohorts
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Join cohort-based learning programs designed by industry experts. 
                Learn together, build projects, and achieve your goals.
            </p>
        </div>

        <!-- Cohorts Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            @forelse($featuredCohorts ?? [] as $cohort)
            <a href="{{ route('cohorts.show', $cohort->slug) }}" 
               class="group bg-white rounded-xl border border-gray-200 p-6 hover:border-indigo-300 hover:shadow-lg transition-all duration-200">
                <!-- Badge Circle -->
                @if($cohort->badge)
                <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-indigo-100 text-indigo-600 font-bold text-lg mb-4 group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-200">
                    {{ $cohort->badge }}
                </div>
                @endif

                <!-- Title -->
                <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition-colors">
                    {{ $cohort->name }}
                </h3>

                <!-- Description -->
                <p class="text-sm text-gray-600 mb-4 line-clamp-2">
                    {{ $cohort->short_description ?? Str::limit($cohort->description, 100) }}
                </p>

                <!-- Stats -->
                <div class="flex items-center justify-between text-xs text-gray-500 pt-4 border-t border-gray-100">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                        {{ $cohort->enrolledCount() }} members
                    </span>
                    <span class="text-indigo-600 font-medium group-hover:underline">
                        Join →
                    </span>
                </div>
            </a>
            @empty
            <!-- Placeholder cohorts if none exist -->
            @for($i = 1; $i <= 4; $i++)
            <div class="bg-white rounded-xl border border-gray-200 p-6">
                <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-indigo-100 text-indigo-600 font-bold text-lg mb-4">
                    {{ $i }}
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">
                    Cohort {{ $i }}
                </h3>
                <p class="text-sm text-gray-600 mb-4">
                    Join our learning cohort and grow your skills with peers.
                </p>
                <div class="flex items-center justify-between text-xs text-gray-500 pt-4 border-t border-gray-100">
                    <span>Coming soon...</span>
                </div>
            </div>
            @endfor
            @endforelse
        </div>

        <!-- View All Button -->
        <div class="text-center">
            <a href="{{ route('cohorts.index') }}" 
               class="inline-flex items-center px-6 py-3 bg-white text-indigo-600 font-semibold rounded-lg border-2 border-indigo-600 hover:bg-indigo-50 transition-all duration-200">
                Browse all cohorts
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
    </div>
</div>

<!-- Community Features -->
<div class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                💬 Join Our Thriving Community
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Connect with learners worldwide, participate in discussions, attend events, and showcase your work.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Discussions -->
            <a href="{{ route('discussions.index') }}" 
               class="group bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl p-8 hover:shadow-xl transition-all duration-200 border-2 border-transparent hover:border-indigo-200">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-xl bg-indigo-100 text-indigo-600 mb-6 group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-200">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-indigo-600 transition-colors">
                    Discussions
                </h3>
                <p class="text-gray-600 leading-relaxed mb-4">
                    Ask questions, share insights, and help others grow. Join conversations with fellow learners.
                </p>
                <span class="text-indigo-600 font-medium group-hover:underline">
                    Join discussions →
                </span>
            </a>

            <!-- Events -->
            <a href="{{ route('events.index') }}" 
               class="group bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl p-8 hover:shadow-xl transition-all duration-200 border-2 border-transparent hover:border-purple-200">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-xl bg-purple-100 text-purple-600 mb-6 group-hover:bg-purple-600 group-hover:text-white transition-colors duration-200">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-purple-600 transition-colors">
                    Events
                </h3>
                <p class="text-gray-600 leading-relaxed mb-4">
                    Join workshops, webinars, and networking sessions. Connect with peers and industry experts.
                </p>
                <span class="text-purple-600 font-medium group-hover:underline">
                    View events →
                </span>
            </a>

            <!-- Spotlight -->
            <a href="{{ route('spotlight') }}" 
               class="group bg-gradient-to-br from-pink-50 to-indigo-50 rounded-xl p-8 hover:shadow-xl transition-all duration-200 border-2 border-transparent hover:border-pink-200">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-xl bg-pink-100 text-pink-600 mb-6 group-hover:bg-pink-600 group-hover:text-white transition-colors duration-200">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-pink-600 transition-colors">
                    Spotlight
                </h3>
                <p class="text-gray-600 leading-relaxed mb-4">
                    Celebrate success stories from our community. Get inspired by amazing achievements.
                </p>
                <span class="text-pink-600 font-medium group-hover:underline">
                    View spotlight →
                </span>
            </a>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">
            Ready to Start Your Learning Journey?
        </h2>
        <p class="text-xl text-indigo-100 mb-8 leading-relaxed">
            Join thousands of learners who are already growing their skills and building amazing things.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="{{ route('register') }}" 
               class="inline-flex items-center px-8 py-4 bg-white text-indigo-600 font-semibold rounded-lg hover:bg-gray-100 transition-all duration-200 shadow-lg">
                Create Free Account
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            </a>
            <a href="{{ route('login') }}" 
               class="inline-flex items-center px-8 py-4 bg-transparent text-white font-semibold rounded-lg border-2 border-white hover:bg-white hover:text-indigo-600 transition-all duration-200">
                Sign In
            </a>
        </div>
    </div>
</div>

<!-- Stats Section -->
<div class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
            <div>
                <div class="text-4xl font-bold text-indigo-600 mb-2">{{ $stats['users'] ?? '1,000+' }}</div>
                <div class="text-gray-600 font-medium">Active Learners</div>
            </div>
            <div>
                <div class="text-4xl font-bold text-indigo-600 mb-2">{{ $stats['cohorts'] ?? '50+' }}</div>
                <div class="text-gray-600 font-medium">Cohorts</div>
            </div>
            <div>
                <div class="text-4xl font-bold text-indigo-600 mb-2">{{ $stats['discussions'] ?? '5,000+' }}</div>
                <div class="text-gray-600 font-medium">Discussions</div>
            </div>
            <div>
                <div class="text-4xl font-bold text-indigo-600 mb-2">{{ $stats['events'] ?? '200+' }}</div>
                <div class="text-gray-600 font-medium">Events</div>
            </div>
        </div>
    </div>
</div>
@endsection
