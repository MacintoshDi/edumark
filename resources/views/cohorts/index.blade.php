{{-- resources/views/cohorts/index.blade.php --}}
<x-app-layout>
    <x-slot name="title">Cohorts</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Cohorts</h1>
                <p class="text-gray-600">Browse and enroll in our learning cohorts</p>
            </div>

            <!-- Filters -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                <form method="GET" action="{{ route('cohorts.index') }}" class="flex flex-wrap gap-4">
                    <select name="category" class="rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @foreach($category->children as $child)
                                <option value="{{ $child->id }}" {{ request('category') == $child->id ? 'selected' : '' }}>
                                    &nbsp;&nbsp;→ {{ $child->name }}
                                </option>
                            @endforeach
                        @endforeach
                    </select>

                    <select name="status" class="rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">All Status</option>
                        <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Upcoming</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                    </select>

                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Apply Filters
                    </button>
                    
                    @if(request()->hasAny(['category', 'status']))
                    <a href="{{ route('cohorts.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                        Clear Filters
                    </a>
                    @endif
                </form>
            </div>

            <!-- Cohorts Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($cohorts as $cohort)
                <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition">
                    <div class="p-6">
                        <!-- Badge -->
                        <div class="flex items-center justify-between mb-4">
                            @if($cohort->category)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $cohort->category->name }}
                            </span>
                            @endif
                            <span class="text-xs font-medium {{ $cohort->status === 'active' ? 'text-green-600' : 'text-gray-600' }}">
                                {{ ucfirst($cohort->status) }}
                            </span>
                        </div>

                        <!-- Title -->
                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $cohort->name }}</h3>
                        
                        <!-- Description -->
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ $cohort->description }}</p>

                        <!-- Meta Info -->
                        <div class="space-y-2 text-sm text-gray-500 mb-4">
                            @if($cohort->start_date)
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Starts {{ $cohort->start_date->format('M d, Y') }}
                            </div>
                            @endif
                            
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                                {{ $cohort->enrolledCount() }} / {{ $cohort->max_students ?? '∞' }} students
                            </div>

                            @if($cohort->price)
                            <div class="text-lg font-bold text-blue-600 mt-2">
                                ${{ number_format($cohort->price, 2) }}
                            </div>
                            @endif
                        </div>

                        <!-- Action Button -->
                        <a href="{{ route('cohorts.show', $cohort->slug) }}" 
                           class="block w-full text-center px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
                            View Details
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No cohorts found</h3>
                    <p class="mt-1 text-sm text-gray-500">Try adjusting your filters</p>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $cohorts->links() }}
            </div>
        </div>
    </div>
</x-app-layout>