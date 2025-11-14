@extends('layouts.app')

@section('title', 'Events')

@section('content')
<div class="space-y-8">
    <!-- Header -->
    <div class="bg-surface rounded-lg shadow-card p-6">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-copy">Events</h1>
                <p class="mt-1 text-copy-light">Join our workshops, webinars, and networking sessions.</p>
            </div>
            <button class="btn-primary">Create Event</button>
        </div>
    </div>
    
    <!-- Featured Event -->
    <div>
        <h2 class="text-xl font-bold text-copy mb-4">Featured Event</h2>
        <div class="bg-surface rounded-lg shadow-card overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="p-6 flex flex-col justify-center">
                    <p class="text-sm font-semibold text-primary">Webinar ・ June 25, 2024</p>
                    <h3 class="mt-2 text-2xl font-bold text-copy">Mastering YouTube for Business</h3>
                    <p class="mt-2 text-copy-light">Join our expert panel as they discuss strategies to grow your brand and audience on YouTube. We'll cover everything from content strategy to monetization.</p>
                    <div class="mt-6">
                        <button class="btn-primary">Register Now</button>
                    </div>
                </div>
                <div class="hidden md:block">
                     <img class="h-full w-full object-cover" src="{{ asset('assets/images/event-placeholder.png') }}" alt="YouTube for Business Webinar">
                </div>
            </div>
        </div>
    </div>

    <!-- All Events -->
    <div data-tab-container>
        <div class="flex items-center justify-between border-b border-border-color">
            <h2 class="text-xl font-bold text-copy">All Events</h2>
            <nav class="-mb-px flex space-x-6" aria-label="Tabs">
                <button data-tab data-tab-target="panel-upcoming" class="tab-button active" role="tab">Upcoming</button>
                <button data-tab data-tab-target="panel-past" class="tab-button" role="tab">Past</button>
            </nav>
        </div>
        <div class="mt-6">
            <!-- Upcoming Events Panel -->
            <div id="panel-upcoming" data-tab-panel role="tabpanel">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($events as $event)
                        <x-event-card :event="$event" />
                    @empty
                        <div class="md:col-span-2 lg:col-span-3 text-center bg-surface rounded-lg shadow-card p-8">
                            <p class="text-copy-light">No upcoming events scheduled. Check back soon!</p>
                        </div>
                    @endforelse
                </div>
            </div>
            <!-- Past Events Panel -->
            <div id="panel-past" data-tab-panel role="tabpanel" class="hidden">
                <div class="text-center bg-surface rounded-lg shadow-card p-8">
                    <p class="text-copy-light">No past events to show.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection