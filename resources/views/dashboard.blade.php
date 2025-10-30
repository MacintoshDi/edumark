{{-- resources/views/dashboard.blade.php --}}
<x-app-layout>
    <x-slot name="title">Dashboard</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Welcome Section -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Welcome back, {{ auth()->user()->name }}! 👋</h1>
                <p class="text-gray-600 mt-2">Here's what's happening in your learning journey</p>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Active Cohorts</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ $myCohorts->count() }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Total Points</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ auth()->user()->points }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Badges</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ auth()->user()->badges()->count() }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Upcoming Events</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ $upcomingEvents->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- My Cohorts -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-xl font-bold text-gray-900">My Cohorts</h2>
                            <a href="{{ route('cohorts.index') }}" class="text-blue-600 hover:text-blue-700 text-sm font-medium">
                                Browse all →
                            </a>
                        </div>
                        @forelse($myCohorts as $cohort)
                        <a href="{{ route('cohorts.show', $cohort->slug) }}" 
                           class="block mb-4 p-4 border border-gray-200 rounded-lg hover:border-blue-500 transition">
                            <div class="flex items-start justify-between">
                                <div class="flex-1">
                                    <h3 class="font-semibold text-gray-900 mb-1">{{ $cohort->name }}</h3>
                                    <p class="text-sm text-gray-600 mb-2">{{ Str::limit($cohort->description, 80) }}</p>
                                    <div class="flex items-center space-x-4 text-xs text-gray-500">
                                        <span>{{ $cohort->students->count() }} students</span>
                                        @if($cohort->pivot->progress)
                                        <span>{{ $cohort->pivot->progress }}% complete</span>
                                        @endif
                                    </div>
                                </div>
                                @if($cohort->pivot->progress)
                                <div class="ml-4">
                                    <div class="w-16 h-16">
                                        <svg class="transform -rotate-90" viewBox="0 0 36 36">
                                            <path class="text-gray-200" stroke="currentColor" stroke-width="3" fill="none" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                                            <path class="text-blue-600" stroke="currentColor" stroke-width="3" fill="none" stroke-dasharray="{{ $cohort->pivot->progress }}, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                                        </svg>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </a>
                        @empty
                        <div class="text-center py-8">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No cohorts yet</h3>
                            <p class="mt-1 text-sm text-gray-500">Get started by enrolling in a cohort</p>
                            <div class="mt-6">
                                <a href="{{ route('cohorts.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700">
                                    Browse Cohorts
                                </a>
                            </div>
                        </div>
                        @endforelse
                    </div>

                    <!-- Recent Discussions -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-xl font-bold text-gray-900">Recent Discussions</h2>
                            <a href="{{ route('discussions.index') }}" class="text-blue-600 hover:text-blue-700 text-sm font-medium">
                                View all →
                            </a>
                        </div>
                        <div class="space-y-3">
                            @foreach($recentDiscussions as $discussion)
                            <a href="{{ route('discussions.show', $discussion) }}" 
                               class="block p-3 border border-gray-200 rounded-lg hover:border-blue-500 transition">
                                <h4 class="font-medium text-gray-900 mb-1">{{ $discussion->title }}</h4>
                                <div class="flex items-center space-x-4 text-xs text-gray-500">
                                    <span>{{ $discussion->user->name }}</span>
                                    <span>{{ $discussion->replies->count() }} replies</span>
                                    <span>{{ $discussion->created_at->diffForHumans() }}</span>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Upcoming Events -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-bold text-gray-900">Upcoming Events</h3>
                            <a href="{{ route('events.index') }}" class="text-blue-600 hover:text-blue-700 text-sm font-medium">
                                View all →
                            </a>
                        </div>
                        <div class="space-y-3">
                            @forelse($upcomingEvents as $event)
                            <a href="{{ route('events.show', $event) }}" 
                               class="block p-3 border border-gray-200 rounded-lg hover:border-blue-500 transition">
                                <h4 class="font-medium text-gray-900 mb-1">{{ $event->title }}</h4>
                                <p class="text-xs text-gray-600 mb-2">{{ Str::limit($event->description, 60) }}</p>
                                <p class="text-xs text-gray-500">{{ $event->start_time->format('M d, g:i A') }}</p>
                            </a>
                            @empty
                            <p class="text-sm text-gray-500 text-center py-4">No upcoming events</p>
                            @endforelse
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Recent Activity</h3>
                        <div class="space-y-4">
                            @foreach($recentActivity->take(5) as $activity)
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-3 flex-1">
                                    <p class="text-sm text-gray-900">{{ $activity->description }}</p>
                                    <p class="text-xs text-gray-500 mt-1">{{ $activity->created_at->diffForHumans() }}</p>
                                    @if($activity->points_earned > 0)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800 mt-1">
                                        +{{ $activity->points_earned }} pts
                                    </span>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Quick Actions</h3>
                        <div class="space-y-2">
                            <a href="{{ route('discussions.create') }}" 
                               class="block w-full px-4 py-2 bg-blue-600 text-white text-center rounded-lg hover:bg-blue-700 transition">
                                Start a Discussion
                            </a>
                            <a href="{{ route('cohorts.index') }}" 
                               class="block w-full px-4 py-2 bg-white text-blue-600 border border-blue-600 text-center rounded-lg hover:bg-blue-50 transition">
                                Browse Cohorts
                            </a>
                            <a href="{{ route('jobs.index') }}" 
                               class="block w-full px-4 py-2 bg-white text-blue-600 border border-blue-600 text-center rounded-lg hover:bg-blue-50 transition">
                                View Jobs
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>