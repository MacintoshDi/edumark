{{-- resources/views/discussions/index.blade.php --}}
<x-app-layout>
    <x-slot name="title">Discussions</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Discussions</h1>
                    <p class="text-gray-600">Join the conversation with your peers and instructors</p>
                </div>
                <a href="{{ route('discussions.create') }}" 
                   class="px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
                    Start Discussion
                </a>
            </div>

            <!-- Filters -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                <form method="GET" action="{{ route('discussions.index') }}" class="flex flex-wrap gap-4">
                    <input type="text" 
                           name="search" 
                           value="{{ request('search') }}"
                           placeholder="Search discussions..." 
                           class="flex-1 min-w-64 rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                    
                    <select name="cohort" class="rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">All Cohorts</option>
                        @foreach($cohorts as $cohort)
                            <option value="{{ $cohort->id }}" {{ request('cohort') == $cohort->id ? 'selected' : '' }}>
                                {{ $cohort->name }}
                            </option>
                        @endforeach
                    </select>

                    <select name="type" class="rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">All Types</option>
                        <option value="general" {{ request('type') == 'general' ? 'selected' : '' }}>General</option>
                        <option value="question" {{ request('type') == 'question' ? 'selected' : '' }}>Question</option>
                        <option value="announcement" {{ request('type') == 'announcement' ? 'selected' : '' }}>Announcement</option>
                    </select>

                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Apply Filters
                    </button>
                    
                    @if(request()->hasAny(['search', 'cohort', 'type']))
                    <a href="{{ route('discussions.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                        Clear
                    </a>
                    @endif
                </form>
            </div>

            <!-- Discussions List -->
            <div class="space-y-4">
                @forelse($discussions as $discussion)
                <div class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition">
                    <div class="flex items-start">
                        <!-- Avatar -->
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 rounded-full bg-blue-500 flex items-center justify-center text-white font-semibold">
                                {{ substr($discussion->user->name, 0, 1) }}
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="ml-4 flex-1">
                            <div class="flex items-start justify-between">
                                <div class="flex-1">
                                    <a href="{{ route('discussions.show', $discussion) }}" 
                                       class="text-lg font-semibold text-gray-900 hover:text-blue-600">
                                        @if($discussion->is_pinned)
                                        📌
                                        @endif
                                        {{ $discussion->title }}
                                    </a>
                                    
                                    <div class="flex items-center space-x-3 mt-2 text-sm text-gray-500">
                                        <span>{{ $discussion->user->name }}</span>
                                        @if($discussion->cohort)
                                        <span>in {{ $discussion->cohort->name }}</span>
                                        @endif
                                        <span>{{ $discussion->created_at->diffForHumans() }}</span>
                                    </div>

                                    <p class="text-gray-600 mt-2 line-clamp-2">{{ $discussion->content }}</p>
                                </div>

                                <div class="ml-4 flex items-center space-x-2">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium 
                                        {{ $discussion->type === 'question' ? 'bg-blue-100 text-blue-800' : '' }}
                                        {{ $discussion->type === 'announcement' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                        {{ $discussion->type === 'general' ? 'bg-gray-100 text-gray-800' : '' }}">
                                        {{ ucfirst($discussion->type) }}
                                    </span>
                                </div>
                            </div>

                            <!-- Stats -->
                            <div class="flex items-center space-x-6 mt-4 text-sm text-gray-500">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                    </svg>
                                    {{ $discussion->repliesCount() }} replies
                                </span>
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                    {{ $discussion->likesCount() }} likes
                                </span>
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    {{ $discussion->views }} views
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center py-12 bg-white rounded-lg shadow-sm">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No discussions found</h3>
                    <p class="mt-1 text-sm text-gray-500">Get started by creating a new discussion</p>
                    <div class="mt-6">
                        <a href="{{ route('discussions.create') }}" 
                           class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700">
                            Start Discussion
                        </a>
                    </div>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $discussions->links() }}
            </div>
        </div>
    </div>
</x-app-layout>