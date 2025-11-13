@extends('layouts.app')

@section('title', 'Growth Marketing Cohort')

@section('content')
<div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
    <!-- Main Content -->
    <div class="xl:col-span-2 space-y-8">
        <!-- Cohort Header -->
        <div class="bg-surface rounded-lg shadow-card">
            <div class="h-40 bg-cover bg-center rounded-t-lg" style="background-image: url('{{ asset('assets/images/cohort-growth-marketing.png') }}')"></div>
            <div class="p-6">
                <h1 class="text-3xl font-bold text-copy">Growth Marketing</h1>
                <p class="mt-2 text-copy-light">This is the space for members of the Growth Marketing cohort. Ask questions, share your learnings, and connect with fellow students and instructors.</p>
                <div class="mt-4">
                    <button class="btn-primary">Join Cohort</button>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <div data-tab-container>
            <div class="border-b border-border-color">
                <nav class="-mb-px flex space-x-6" aria-label="Tabs">
                    <button data-tab data-tab-target="panel-discussion" class="tab-button active" aria-selected="true" role="tab">Discussion</button>
                    <button data-tab data-tab-target="panel-assignments" class="tab-button" aria-selected="false" role="tab">Assignments</button>
                    <button data-tab data-tab-target="panel-resources" class="tab-button" aria-selected="false" role="tab">Resources</button>
                </nav>
            </div>
            <div class="mt-6">
                <!-- Discussion Panel -->
                <div id="panel-discussion" data-tab-panel role="tabpanel" class="space-y-6">
                     @forelse ($posts as $post)
                        <x-discussion-post :post="$post" />
                    @empty
                        <div class="bg-surface rounded-lg shadow-card p-6 text-center">
                            <h3 class="text-lg font-semibold text-copy">No discussions yet.</h3>
                            <p class="mt-2 text-copy-light">Be the first one to start a conversation!</p>
                        </div>
                    @endforelse
                </div>
                <!-- Assignments Panel -->
                <div id="panel-assignments" data-tab-panel role="tabpanel" class="hidden">
                    <div class="bg-surface rounded-lg shadow-card p-6 text-center">
                        <h3 class="text-lg font-semibold text-copy">No Assignments Yet</h3>
                        <p class="mt-2 text-copy-light">Check back later for new assignments.</p>
                    </div>
                </div>
                <!-- Resources Panel -->
                <div id="panel-resources" data-tab-panel role="tabpanel" class="hidden">
                     <div class="bg-surface rounded-lg shadow-card p-6 text-center">
                        <h3 class="text-lg font-semibold text-copy">No Resources Available</h3>
                        <p class="mt-2 text-copy-light">Resources and course materials will be added here.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Sidebar -->
    <div class="space-y-6">
        <!-- About -->
        <div class="bg-surface rounded-lg shadow-card p-5">
            <h3 class="font-bold text-copy">About this cohort</h3>
            <p class="mt-2 text-sm text-copy-light">Learn the fundamentals of growing a business online through various marketing channels.</p>
            <ul class="mt-4 space-y-2 text-sm text-copy-light">
                <li class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M10 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM3.465 14.493a1.23 1.23 0 0 0 .41 1.412A9.957 9.957 0 0 0 10 18c2.31 0 4.438-.784 6.131-2.095a1.23 1.23 0 0 0 .41-1.412a9.99 9.99 0 0 0-9.695-6.612 9.99 9.99 0 0 0-9.695 6.612Z" /></svg>
                    <span>128 Members</span>
                </li>
                 <li class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M10 2a.75.75 0 0 1 .75.75v1.5a.75.75 0 0 1-1.5 0v-1.5A.75.75 0 0 1 10 2Z M10 15a.75.75 0 0 1 .75.75v1.5a.75.75 0 0 1-1.5 0v-1.5A.75.75 0 0 1 10 15ZM10 7a3 3 0 1 0 0 6 3 3 0 0 0 0-6Z" /><path fill-rule="evenodd" d="M16.5 10a.75.75 0 0 1-.75.75h-1.5a.75.75 0 0 1 0-1.5h1.5a.75.75 0 0 1 .75.75ZM5 10a.75.75 0 0 1-.75.75H2.75a.75.75 0 0 1 0-1.5H4.25A.75.75 0 0 1 5 10Z" clip-rule="evenodd" /></svg>
                    <span>Public Cohort</span>
                </li>
            </ul>
        </div>
        <!-- Members -->
        <div class="bg-surface rounded-lg shadow-card p-5">
            <h3 class="font-bold text-copy">Members (8)</h3>
            <div class="mt-4 grid grid-cols-4 gap-3">
                @foreach (['jessica-harris.jpg', 'daniel-wilson.jpg', 'emily-davis.jpg', 'mike-johnson.jpg', 'sarah-miller.jpg', 'david-anderson.jpg', 'jennifer-white.jpg', 'john-carter.jpg'] as $avatar)
                    <a href="#">
                        <img class="w-12 h-12 rounded-full object-cover" src="{{ asset('assets/images/avatars/' . $avatar) }}" alt="Member">
                    </a>
                @endforeach
            </div>
             <div class="mt-4">
                <a href="#" class="btn-secondary w-full text-sm">View all members</a>
            </div>
        </div>
    </div>
</div>
@endsection
