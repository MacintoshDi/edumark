{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Edumark' }} - E-Learning Community Platform</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased bg-gray-50">
    <div class="min-h-screen">
        <!-- Navigation -->
        <nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ route('home') }}" class="flex items-center space-x-2">
                                <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5zm0 18c-3.31 0-6-2.69-6-6V8.5l6-3 6 3V14c0 3.31-2.69 6-6 6z"/>
                                </svg>
                                <span class="text-2xl font-bold text-gray-900">edumark</span>
                            </a>
                        </div>

                        <!-- Navigation Links -->
@php
    $mainMenu = \App\Http\Controllers\MenuController::getMenu('main-menu');
@endphp

@if($mainMenu && $mainMenu->items->count() > 0)
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    @foreach($mainMenu->items as $item)
        <x-nav-link :href="$item->url" :active="request()->is(trim($item->url, '/'))">
            {{ $item->label }}
        </x-nav-link>
    @endforeach
</div>
@endif
                    </div>

                    <div class="hidden sm:flex sm:items-center sm:ml-6 space-x-4">
                        @auth
                        <!-- Search -->
                        <form action="{{ route('search') }}" method="GET" class="relative">
                            <input type="text" 
                                   name="q" 
                                   placeholder="Search..." 
                                   class="w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </form>

                        <!-- Notifications -->
                        <button type="button" class="relative p-2 text-gray-600 hover:text-gray-900">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                            </svg>
                            <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500"></span>
                        </button>

                        <!-- User Dropdown -->
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center space-x-2 text-sm font-medium text-gray-700 hover:text-gray-900">
                                <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center text-white font-semibold">
                                    {{ substr(auth()->user()->name, 0, 1) }}
                                </div>
                                <span>{{ auth()->user()->name }}</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>

                            <div x-show="open" 
                                 @click.away="open = false"
                                 x-transition
                                 class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                <a href="{{ route('profile.badges') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Badges & Points ({{ auth()->user()->points }})
                                </a>
                                <a href="{{ route('connect') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Messages</a>
                                <a href="{{ route('showcase') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Showcase</a>
                                <a href="{{ route('spotlight') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Spotlight</a>
                                <div class="border-t border-gray-100"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Sign out
                                    </button>
                                </form>
                            </div>
                        </div>
                        @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900">Login</a>
                        <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                            Sign Up
                        </a>
                        @endauth
                    </div>

                    <!-- Mobile menu button -->
                    <div class="flex items-center sm:hidden">
                        <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main>
            @if(session('success'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>
            </div>
            @endif

            @if(session('error'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg">
                    {{ session('error') }}
                </div>
            </div>
            @endif

            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-gray-200 mt-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Edumark</h3>
                        <p class="text-gray-600 text-sm">Your e-learning community platform for growth and success.</p>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-3">Platform</h4>
                        <ul class="space-y-2 text-sm text-gray-600">
                            <li><a href="{{ route('cohorts.index') }}" class="hover:text-blue-600">Cohorts</a></li>
                            <li><a href="{{ route('discussions.index') }}" class="hover:text-blue-600">Discussions</a></li>
                            <li><a href="{{ route('events.index') }}" class="hover:text-blue-600">Events</a></li>
                            <li><a href="{{ route('jobs.index') }}" class="hover:text-blue-600">Job Board</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-3">Community</h4>
                        <ul class="space-y-2 text-sm text-gray-600">
                            <li><a href="{{ route('student-directory') }}" class="hover:text-blue-600">Student Directory</a></li>
                            <li><a href="{{ route('spotlight') }}" class="hover:text-blue-600">Spotlight</a></li>
                            <li><a href="{{ route('showcase') }}" class="hover:text-blue-600">Showcase</a></li>
                            <li><a href="{{ route('connect') }}" class="hover:text-blue-600">Connect</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-3">Legal</h4>
                        <ul class="space-y-2 text-sm text-gray-600">
                            <li><a href="#" class="hover:text-blue-600">About</a></li>
                            <li><a href="#" class="hover:text-blue-600">Privacy Policy</a></li>
                            <li><a href="#" class="hover:text-blue-600">Terms of Service</a></li>
                            <li><a href="#" class="hover:text-blue-600">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="border-t border-gray-200 mt-8 pt-8 text-center text-sm text-gray-600">
                    <p>&copy; {{ date('Y') }} Edumark. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>

    @livewireScripts
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>