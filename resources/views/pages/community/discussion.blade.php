@extends('layouts.app')

@section('title', 'Discussion')

@section('content')
<div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
    <!-- Main Feed -->
    <div class="xl:col-span-2 space-y-6">
        <!-- Create Post -->
        <div class="bg-surface rounded-lg shadow-card p-4">
            <div class="flex items-start gap-4">
                <img class="w-10 h-10 rounded-full object-cover" src="{{ asset('assets/images/avatars/jessica-harris.jpg') }}" alt="Jessica Harris">
                <div class="flex-grow">
                    <textarea class="w-full border-0 ring-1 ring-inset ring-gray-300 rounded-md p-3 focus:ring-2 focus:ring-primary placeholder:text-gray-400" rows="3" placeholder="What's on your mind?"></textarea>
                    <div class="mt-3 flex items-center justify-end">
                        <button class="btn-primary">Post</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Feed Posts -->
        @forelse ($posts as $post)
            <x-discussion-post :post="$post"/>
        @empty
             <div class="bg-surface rounded-lg shadow-card p-6 text-center">
                <h3 class="text-lg font-semibold text-copy">No discussions yet.</h3>
                <p class="mt-2 text-copy-light">Start a conversation to get things going!</p>
            </div>
        @endforelse
    </div>

    <!-- Right Sidebar -->
    <div class="space-y-6">
        <!-- Featured Posts -->
        <div class="bg-surface rounded-lg shadow-card p-5">
            <h3 class="font-bold text-copy">Featured Posts</h3>
            <ul class="mt-4 space-y-4">
                <li>
                    <a href="#" class="flex items-start gap-4 group">
                        <img class="w-20 h-16 object-cover rounded-md" src="{{ asset('assets/images/discussion-featured-1.png') }}" alt="Featured post 1">
                        <div>
                            <p class="font-semibold text-sm text-copy group-hover:text-primary">The Ultimate Guide to Content Distribution</p>
                            <p class="text-xs text-copy-lightest mt-1">By David Anderson</p>
                        </div>
                    </a>
                </li>
                <li>
                     <a href="#" class="flex items-start gap-4 group">
                        <img class="w-20 h-16 object-cover rounded-md" src="{{ asset('assets/images/discussion-featured-2.png') }}" alt="Featured post 2">
                        <div>
                            <p class="font-semibold text-sm text-copy group-hover:text-primary">How AI is Changing the SEO Landscape</p>
                            <p class="text-xs text-copy-lightest mt-1">By Emily Davis</p>
                        </div>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Trending Topics -->
        <div class="bg-surface rounded-lg shadow-card p-5">
            <h3 class="font-bold text-copy">Trending Topics</h3>
            <div class="mt-4 flex flex-wrap gap-2">
                @foreach (['#SEO', '#growthhacking', '#videomarketing', '#contentstrategy', '#socialmedia', '#analytics'] as $tag)
                    <a href="#" class="tag bg-primary-50 text-primary-800 hover:bg-primary-100">{{ $tag }}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
