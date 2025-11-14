<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edumark - @yield('title', 'Welcome')</title>

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background font-sans text-copy-light antialiased">
    <div class="flex h-screen flex-col">
        @include('partials._topbar')
        
        <div class="flex flex-1 overflow-hidden">
            @include('partials._sidebar')
            
            <div class="flex flex-1 flex-col lg:pl-64">
                @include('partials._header')
                
                <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    <!-- Search Overlay -->
    <div id="search-overlay" class="fixed inset-0 z-[100] flex-col items-center bg-background/95 p-6 backdrop-blur-sm hidden">
        <button id="search-overlay-close" type="button" class="btn-icon absolute right-6 top-6" aria-label="Close search">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
        </button>
        <div class="w-full max-w-xl pt-16">
            <div class="relative">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-5">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg>
                </div>
                <input id="search-input" type="text" placeholder="Search for anything..." class="w-full rounded-xl border-gray-300 bg-white py-3.5 px-5 pl-14 text-lg shadow-sm outline-none focus:ring-2 focus:ring-primary">
            </div>
        </div>
    </div>
    
    <!-- Mobile Sidebar Overlay -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 opacity-0 pointer-events-none transition-opacity duration-300 lg:hidden"></div>
</body>
</html>