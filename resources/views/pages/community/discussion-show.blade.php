@extends('layouts.app')

@section('title', $post['title'])

@section('content')
<div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
    <!-- Main Content -->
    <div class="xl:col-span-2 space-y-6">
        <!-- Breadcrumbs -->
        <nav class="flex" aria-label="Breadcrumb">
            <ol role="list" class="flex items-center space-x-2 text-sm">
                <li>
                    <div class="flex items-center">
                        <a href="{{ route('community.discussion') }}" class="text-copy-lightest hover:text-copy-light">Discussion</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="h-5 w-5 flex-shrink-0 text-gray-300" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" /></svg>
                        <span class="ml-2 text-copy-light">{{ $post['title'] }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Main Post -->
        <div class="bg-surface rounded-lg shadow-card">
            <div class="p-5">
                <h1 class="text-2xl font-bold text-copy">{{ $post['title'] }}</h1>
                <div class="mt-3 flex items-center gap-3">
                    <img class="w-10 h-10 rounded-full object-cover" src="{{ asset('assets/images/avatars/' . $post['author_avatar']) }}" alt="{{ $post['author'] }}">
                    <div>
                        <p class="font-semibold text-copy">{{ $post['author'] }}</p>
                        <p class="text-xs text-copy-lightest">{{ $post['time'] }}</p>
                    </div>
                </div>
                <div class="mt-4 prose max-w-none prose-p:text-copy-light">
                    {!! $post['content_html'] !!}
                </div>
            </div>
            <div class="px-5 py-3 border-t border-border-color flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <button class="btn-action">
                         <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" /></svg>
                        <span>Like ({{ $post['likes'] }})</span>
                    </button>
                    <span class="text-sm font-medium text-copy-lightest">{{ $post['comments_count'] }} Comments</span>
                </div>
                <button class="btn-secondary text-sm">Follow</button>
            </div>
        </div>

        <!-- Comments Section -->
        <div class="space-y-6">
            <h2 class="text-xl font-bold text-copy">{{ $post['comments_count'] }} Comments</h2>

            <!-- Add Comment Form -->
            <div class="bg-surface rounded-lg shadow-card p-4">
                <div class="flex items-start gap-4">
                    <img class="w-10 h-10 rounded-full object-cover" src="{{ asset('assets/images/avatars/jessica-harris.jpg') }}" alt="Jessica Harris">
                    <div class="flex-grow">
                        <textarea class="w-full border-0 ring-1 ring-inset ring-gray-300 rounded-md p-3 focus:ring-2 focus:ring-primary placeholder:text-gray-400" rows="3" placeholder="Add your comment..."></textarea>
                        <div class="mt-3 flex items-center justify-end">
                            <button class="btn-primary">Post Comment</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Comments List -->
            <div class="space-y-6">
                @foreach ($comments as $comment)
                    <div class="flex items-start gap-4">
                        <img class="w-10 h-10 rounded-full object-cover" src="{{ asset('assets/images/avatars/' . $comment['author_avatar']) }}" alt="{{ $comment['author'] }}">
                        <div class="flex-grow bg-surface rounded-lg shadow-card p-4">
                            <div class="flex items-center justify-between">
                                <p class="font-semibold text-copy">{{ $comment['author'] }}</p>
                                <p class="text-xs text-copy-lightest">{{ $comment['time'] }}</p>
                            </div>
                            <p class="mt-2 text-copy-light">{{ $comment['content'] }}</p>
                             <div class="mt-3">
                                <button class="text-xs font-semibold text-primary hover:underline">Reply</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    <!-- Right Sidebar -->
    <div class="space-y-6">
        <div class="bg-surface rounded-lg shadow-card p-5">
            <h3 class="font-bold text-copy">About this topic</h3>
            <ul class="mt-4 space-y-3 text-sm">
                 <li class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0h18" /></svg>
                    <span class="text-copy-light">Created {{ $post['time'] }}</span>
                </li>
                <li class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 0 1-.923 1.785A5.969 5.969 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Z" /></svg>
                     <span class="text-copy-light">{{ $post['comments_count'] }} comments</span>
                </li>
                 <li class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /></svg>
                     <span class="text-copy-light">{{ count($comments) + 1 }} participants</span>
                </li>
            </ul>
             <div class="mt-4">
                <button class="btn-primary w-full text-sm">Reply to Topic</button>
            </div>
        </div>
    </div>
</div>
@endsection
