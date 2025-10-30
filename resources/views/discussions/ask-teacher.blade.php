{{-- resources/views/discussions/ask-teacher.blade.php --}}
<x-app-layout>
    <x-slot name="title">Ask Your Teacher</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex items-center mb-4">
                    <span class="text-4xl mr-3">❓</span>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Ask Your Teacher</h1>
                        <p class="text-gray-600 mt-1">Get quick answers and recommendations from your instructors</p>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-8">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Need help? Ask your question!</h3>
                        <p class="text-gray-600 mb-4">Connect with your teachers and get personalized support for your learning journey.</p>
                        <a href="{{ route('discussions.create') }}?type=question" 
                           class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Ask a Question
                        </a>
                    </div>
                    <div class="ml-6 hidden md:block">
                        <svg class="w-32 h-32 text-blue-200" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Questions List -->
            <div class="space-y-4">
                @forelse($questions as $question)
                <div class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 rounded-full bg-purple-500 flex items-center justify-center text-white font-semibold">
                                {{ substr($question->user->name, 0, 1) }}
                            </div>
                        </div>

                        <div class="ml-4 flex-1">
                            <a href="{{ route('discussions.show', $question) }}" 
                               class="text-lg font-semibold text-gray-900 hover:text-blue-600">
                                {{ $question->title }}
                            </a>
                            
                            <div class="flex items-center space-x-3 mt-2 text-sm text-gray-500">
                                <span>{{ $question->user->name }}</span>
                                @if($question->cohort)
                                <span>in {{ $question->cohort->name }}</span>
                                @endif
                                <span>{{ $question->created_at->diffForHumans() }}</span>
                            </div>

                            <p class="text-gray-600 mt-2 line-clamp-2">{{ $question->content }}</p>

                            <div class="flex items-center space-x-6 mt-4 text-sm">
                                <span class="flex items-center text-gray-500">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                    </svg>
                                    {{ $question->repliesCount() }} answers
                                </span>
                                
                                @if($question->replies()->where('is_solution', true)->exists())
                                <span class="flex items-center text-green-600 font-medium">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Solved
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center py-12 bg-white rounded-lg shadow-sm">
                    <p class="text-gray-500">No questions yet. Be the first to ask!</p>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $questions->links() }}
            </div>
        </div>
    </div>
</x-app-layout>