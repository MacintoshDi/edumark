<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edumark - Learning Platform</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-50">
    {{-- Header Navigation with Mobile Support --}}
    <x-menu.header-nav :menuItems="$menuItems ?? []" />

    {{-- Main Content --}}
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-gray-900 sm:text-5xl md:text-6xl">
                Welcome to <span class="text-indigo-600">Edumark</span>
            </h1>
            <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                Your comprehensive learning platform with cohorts, discussions, events, and more.
            </p>
            <div class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8">
                <div class="rounded-md shadow">
                    <a href="/cohorts" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                        Browse Cohorts
                    </a>
                </div>
                <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
                    <a href="/register" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50 md:py-4 md:text-lg md:px-10">
                        Get Started
                    </a>
                </div>
            </div>
        </div>

        {{-- Feature Cards --}}
        <div class="mt-16 grid gap-8 md:grid-cols-3">
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white mb-4">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900">Cohorts</h3>
                <p class="mt-2 text-sm text-gray-500">
                    Join learning cohorts with structured curriculum and dedicated communities.
                </p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white mb-4">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900">Discussions</h3>
                <p class="mt-2 text-sm text-gray-500">
                    Engage in threaded discussions with peers and instructors.
                </p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white mb-4">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900">Events</h3>
                <p class="mt-2 text-sm text-gray-500">
                    Attend virtual and in-person events, workshops, and meetups.
                </p>
            </div>
        </div>
    </main>

    {{-- Footer --}}
    <footer class="mt-16 bg-white border-t border-gray-200">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <p class="text-center text-sm text-gray-500">
                © {{ date('Y') }} Edumark. All rights reserved.
            </p>
        </div>
    </footer>
</body>
</html>