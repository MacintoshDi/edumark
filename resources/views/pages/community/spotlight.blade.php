@extends('layouts.app')

@section('title', 'Community Spotlight')

@section('content')
<div class="space-y-8">
    <!-- Header -->
    <div class="bg-surface rounded-lg shadow-card p-6 text-center">
        <h1 class="text-3xl font-bold text-copy">Community Spotlight</h1>
        <p class="mt-2 max-w-2xl mx-auto text-copy-light">Celebrating the achievements and contributions of our outstanding community members.</p>
    </div>
    
    <!-- Featured Member -->
    <div class="bg-surface rounded-lg shadow-card">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-1">
                <img src="{{ asset('assets/images/avatars/mike-johnson.jpg') }}" alt="Mike Johnson" class="w-full h-full object-cover rounded-t-lg md:rounded-l-lg md:rounded-t-none">
            </div>
            <div class="md:col-span-2 p-8">
                <p class="font-semibold text-primary">Member of the Month</p>
                <h2 class="mt-2 text-3xl font-bold text-copy">Mike Johnson</h2>
                <p class="mt-4 text-copy-light">
                    Mike has been an invaluable member of the Growth Marketing cohort. He consistently provides insightful feedback, helps fellow students with complex topics, and recently shared an incredible case study on A/B testing that has helped dozens of members improve their own campaign results. His positive attitude and willingness to share knowledge embody the spirit of the Edumark community.
                </p>
                <div class="mt-6">
                    <a href="#" class="btn-secondary">View Profile</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Hall of Fame -->
    <div>
        <h2 class="text-xl font-bold text-copy mb-4">Hall of Fame</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @php
            $spotlight_members = [
                ['name' => 'Jennifer White', 'role' => 'Top Contributor', 'avatar' => 'jennifer-white.jpg'],
                ['name' => 'David Anderson', 'role' => 'Community Helper', 'avatar' => 'david-anderson.jpg'],
                ['name' => 'Chris Lee', 'role' => 'Rising Star', 'avatar' => 'chris-lee.jpg'],
                ['name' => 'Daniel Wilson', 'role' => 'Content King', 'avatar' => 'daniel-wilson.jpg'],
            ];
            @endphp

            @foreach ($spotlight_members as $member)
            <div class="bg-surface rounded-lg shadow-card text-center p-6">
                <img class="w-24 h-24 rounded-full mx-auto object-cover" src="{{ asset('assets/images/avatars/' . $member['avatar']) }}" alt="{{ $member['name'] }}">
                <h3 class="mt-4 text-lg font-semibold text-copy">{{ $member['name'] }}</h3>
                <p class="mt-1 text-sm text-copy-lightest">{{ $member['role'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
