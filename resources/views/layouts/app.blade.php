<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Edumark') }} - @yield('title', 'Learning Community')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Additional Head Content -->
    @stack('styles')
</head>
<body class="font-sans antialiased bg-gray-50">
    <div class="min-h-screen flex flex-col">
        <!-- Header Navigation -->
        <header class="bg-white border-b border-gray-200 sticky top-0 z-40">
            @include('components.menu.header-nav', ['menuItems' => $menuItems ?? []])
        </header>

        <!-- Page Content -->
        <main class="flex-1">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-gray-200 mt-auto">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <!-- Column 1: About -->
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 uppercase tracking-wider mb-4">
                            About Edumark
                        </h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Join our thriving community of learners, mentors, and professionals. 
                            Connect, learn, and grow together.
                        </p>
                    </div>

                    <!-- Column 2: Community -->
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 uppercase tracking-wider mb-4">
                            Community
                        </h3>
                        <ul class="space-y-3">
                            <li>
                                <a href="{{ route('cohorts.index') }}" class="text-gray-600 hover:text-indigo-600 text-sm transition">
                                    Cohorts
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('discussions.index') }}" class="text-gray-600 hover:text-indigo-600 text-sm transition">
                                    Discussions
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('events.index') }}" class="text-gray-600 hover:text-indigo-600 text-sm transition">
                                    Events
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('student-directory') }}" class="text-gray-600 hover:text-indigo-600 text-sm transition">
                                    Student Directory
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Column 3: Resources -->
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 uppercase tracking-wider mb-4">
                            Resources
                        </h3>
                        <ul class="space-y-3">
                            <li>
                                <a href="{{ route('jobs.index') }}" class="text-gray-600 hover:text-indigo-600 text-sm transition">
                                    Job Board
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('mentorship.index') }}" class="text-gray-600 hover:text-indigo-600 text-sm transition">
                                    Mentorship
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('spotlight') }}" class="text-gray-600 hover:text-indigo-600 text-sm transition">
                                    Spotlight
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('showcase.index') }}" class="text-gray-600 hover:text-indigo-600 text-sm transition">
                                    Showcase
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Column 4: Support -->
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 uppercase tracking-wider mb-4">
                            Support
                        </h3>
                        <ul class="space-y-3">
                            <li>
                                <a href="#" class="text-gray-600 hover:text-indigo-600 text-sm transition">
                                    Help Center
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-600 hover:text-indigo-600 text-sm transition">
                                    Terms of Service
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-600 hover:text-indigo-600 text-sm transition">
                                    Privacy Policy
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-600 hover:text-indigo-600 text-sm transition">
                                    Contact Us
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Copyright -->
                <div class="border-t border-gray-200 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-500 text-sm">
                        &copy; {{ date('Y') }} Edumark. All rights reserved.
                    </p>
                    <div class="flex items-center space-x-2 mt-4 md:mt-0">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Made with Laravel
                        </span>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Additional Scripts -->
    @stack('scripts')
</body>
</html>
