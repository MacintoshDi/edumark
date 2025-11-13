@extends('layouts.app')

@section('title', 'Showcase')

@section('content')
<div class="space-y-8">
    <!-- Header -->
    <div class="bg-surface rounded-lg shadow-card p-6">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-copy">Showcase</h1>
                <p class="mt-1 text-copy-light">Check out the amazing projects built by our community members.</p>
            </div>
            <button class="btn-primary">Submit Your Project</button>
        </div>
    </div>
    
    <!-- Showcase Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($projects as $project)
            @php
                // Convert PHP array to a JSON string for the data attribute, ensuring asset URLs are correct
                $jsonData = htmlspecialchars(json_encode([
                    'image' => asset('assets/images/' . $project['image']),
                    'title' => $project['title'],
                    'author' => $project['author'],
                    'avatar' => asset('assets/images/avatars/' . $project['avatar']),
                    'likes' => $project['likes'],
                    'comments' => $project['comments'],
                    'description' => $project['description'],
                    'tags' => $project['tags'],
                ]), ENT_QUOTES, 'UTF-8');
            @endphp
        <div class="group relative">
            <button data-modal-trigger data-modal-data="{{ $jsonData }}" class="block w-full">
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-300 rounded-lg"></div>
                <img class="w-full h-60 object-cover rounded-lg" src="{{ asset('assets/images/' . $project['image']) }}" alt="{{ $project['title'] }}">
                <div class="absolute bottom-0 left-0 p-4 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <h3 class="font-bold">{{ $project['title'] }}</h3>
                    <p class="text-sm">by {{ $project['author'] }}</p>
                </div>
            </button>
        </div>
        @endforeach
    </div>
</div>

<!-- Modal -->
<div id="showcase-modal" class="fixed inset-0 z-50 bg-black bg-opacity-70 hidden items-center justify-center p-4">
    <div class="relative bg-surface rounded-lg w-full max-w-4xl max-h-[90vh] flex flex-col md:flex-row">
        <!-- Close button -->
        <button data-modal-close class="absolute -top-4 -right-4 text-white bg-gray-800 rounded-full p-1.5 z-10">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
        
        <!-- Image Section -->
        <div class="w-full md:w-1/2 flex-shrink-0">
            <img id="modal-image" src="" alt="Project Image" class="w-full h-64 md:h-full object-cover rounded-t-lg md:rounded-l-lg md:rounded-t-none">
        </div>

        <!-- Content Section -->
        <div class="w-full md:w-1/2 flex flex-col p-6 overflow-y-auto">
            <div class="flex-grow">
                <div class="flex items-center gap-3">
                    <img id="modal-avatar" src="" alt="Author Avatar" class="w-10 h-10 rounded-full object-cover">
                    <div>
                        <h2 id="modal-title" class="text-xl font-bold text-copy"></h2>
                        <p class="text-sm text-copy-lightest">by <span id="modal-author" class="font-medium"></span></p>
                    </div>
                </div>
                <div id="modal-tags" class="mt-4 flex flex-wrap gap-2"></div>
                <p id="modal-description" class="mt-4 text-copy-light"></p>
            </div>
            <div class="mt-6 pt-4 border-t border-border-color flex-shrink-0">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <button id="modal-likes" class="btn-action"></button>
                        <span id="modal-comments" class="text-sm font-medium text-copy-lightest"></span>
                    </div>
                    <button data-modal-close class="btn-secondary text-sm">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
