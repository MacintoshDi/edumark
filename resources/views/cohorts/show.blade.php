{{-- resources/views/cohorts/show.blade.php --}}
<x-app-layout>
    <x-slot name="title">{{ $cohort->name }}</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="bg-white rounded-lg shadow-sm p-8 mb-6">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex-1">
                        @if($cohort->category)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mb-2">
                            {{ $cohort->category->name }}
                        </span>
                        @endif
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $cohort->name }}</h1>
                        <p class="text-gray-600">{{ $cohort->description }}</p>
                    </div>
                    
                    @if($isEnrolled)
                    <span class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-medium bg-green-100 text-green-800">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Enrolled
                    </span>
                    @else
                    <form method="POST" action="{{ route('cohorts.enroll', $cohort) }}">
                        @csrf
                        <button type="submit" 
                                class="px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition"
                                {{ $cohort->isFull() ? 'disabled' : '' }}>
                            {{ $cohort->isFull() ? 'Cohort Full' : 'Enroll Now' }}
                        </button>
                    </form>
                    @endif
                </div>

                <!-- Meta Information -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-6 pt-6 border-t border-gray-200">
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Start Date</p>
                        <p class="font-semibold text-gray-900">{{ $cohort->start_date?->format('M d, Y') ?? 'TBA' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-1">End Date</p>
                        <p class="font-semibold text-gray-900">{{ $cohort->end_date?->format('M d, Y') ?? 'TBA' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Students Enrolled</p>
                        <p class="font-semibold text-gray-900">{{ $cohort->enrolledCount() }} / {{ $cohort->max_students ?? '∞' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Price</p>
                        <p class="font-semibold text-blue-600">${{ number_format($cohort->price ?? 0, 2) }}</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Resources -->
                    @if($isEnrolled && $resources->count() > 0)
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-4">📚 Resources</h2>
                        <div class="space-y-3">
                            @foreach($resources as $resource)
                            <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg hover:border-blue-500 transition">
                                <div class="flex items-center flex-1">
                                    <div class="flex-shrink-0">
                                        @if($resource->type === 'file')
                                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                        </svg>
                                        @elseif($resource->type === 'link')
                                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                                        </svg>
                                        @else
                                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                        </svg>
                                        @endif
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="font-semibold text-gray-900">{{ $resource->title }}</h4>
                                        @if($resource->description)
                                        <p class="text-sm text-gray-600">{{ Str::limit($resource->description, 60) }}</p>
                                        @endif
                                    </div>
                                </div>
                                @if($resource->type === 'file')
                                <a href="{{ route('resources.download', $resource) }}" 
                                   class="ml-4 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700">
                                    Download
                                </a>
                                @else
                                <a href="{{ $resource->url }}" 
                                   target="_blank"
                                   class="ml-4 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700">
                                    Open
                                </a>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Assignments -->
                    @if($isEnrolled && $assignments->count() > 0)
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-4">📝 Assignments</h2>
                        <div class="space-y-3">
                            @foreach($assignments as $assignment)
                            <a href="{{ route('assignments.show', $assignment) }}" 
                               class="block p-4 border border-gray-200 rounded-lg hover:border-blue-500 transition">
                                <div class="flex items-start justify-between">
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-gray-900 mb-1">{{ $assignment->title }}</h4>
                                        <p class="text-sm text-gray-600 mb-2">{{ Str::limit($assignment->description, 100) }}</p>
                                        <div class="flex items-center space-x-4 text-sm text-gray-500">
                                            <span>{{ $assignment->max_points }} points</span>
                                            @if($assignment->due_date)
                                            <span class="{{ $assignment->isOverdue() ? 'text-red-600' : '' }}">
                                                Due: {{ $assignment->due_date->format('M d, Y') }}
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    @if($assignment->isOverdue())
                                    <span class="ml-4 px-3 py-1 bg-red-100 text-red-800 text-xs font-medium rounded-full">
                                        Overdue
                                    </span>
                                    @endif
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Discussions -->
                    @if($discussions->count() > 0)
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-xl font-bold text-gray-900">💬 Recent Discussions</h2>
                            <a href="{{ route('discussions.index', ['cohort' => $cohort->id]) }}" 
                               class="text-blue-600 hover:text-blue-700 text-sm font-medium">
                                View all
                            </a>
                        </div>
                        <div class="space-y-3">
                            @foreach($discussions as $discussion)
                            <a href="{{ route('discussions.show', $discussion) }}" 
                               class="block p-4 border border-gray-200 rounded-lg hover:border-blue-500 transition">
                                <div class="flex items-start">
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-gray-900 mb-1">{{ $discussion->title }}</h4>
                                        <p class="text-sm text-gray-600 mb-2">{{ Str::limit($discussion->content, 100) }}</p>
                                        <div class="flex items-center space-x-4 text-xs text-gray-500">
                                            <span>{{ $discussion->user->name }}</span>
                                            <span>{{ $discussion->replies->count() }} replies</span>
                                            <span>{{ $discussion->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Teachers -->
                    @if($cohort->teachers->count() > 0)
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">👨‍🏫 Instructors</h3>
                        <div class="space-y-3">
                            @foreach($cohort->teachers as $teacher)
                            <a href="{{ route('student-directory.show', $teacher) }}" 
                               class="flex items-center p-3 rounded-lg hover:bg-gray-50 transition">
                                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center text-white font-semibold">
                                    {{ substr($teacher->name, 0, 1) }}
                                </div>
                                <div class="ml-3">
                                    <p class="font-medium text-gray-900">{{ $teacher->name }}</p>
                                    <p class="text-xs text-gray-500">Instructor</p>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Upcoming Events -->
                    @if($upcomingEvents->count() > 0)
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">📅 Upcoming Events</h3>
                        <div class="space-y-3">
                            @foreach($upcomingEvents as $event)
                            <a href="{{ route('events.show', $event) }}" 
                               class="block p-3 border border-gray-200 rounded-lg hover:border-blue-500 transition">
                                <h4 class="font-medium text-gray-900 mb-1">{{ $event->title }}</h4>
                                <p class="text-xs text-gray-600 mb-2">{{ Str::limit($event->description, 60) }}</p>
                                <p class="text-xs text-gray-500">{{ $event->start_time->format('M d, g:i A') }}</p>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Enrolled Students -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">👥 Students ({{ $cohort->students->count() }})</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($cohort->students->take(12) as $student)
                            <a href="{{ route('student-directory.show', $student) }}" 
                               title="{{ $student->name }}"
                               class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center text-white font-semibold text-sm hover:bg-blue-600 transition">
                                {{ substr($student->name, 0, 1) }}
                            </a>
                            @endforeach
                            @if($cohort->students->count() > 12)
                            <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 text-xs font-semibold">
                                +{{ $cohort->students->count() - 12 }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>