<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Edumark' }} - Learning Community</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-50 font-sans antialiased" x-data="{ mobileMenuOpen: false, searchOpen: false }">
    
    @include('components.top-banner')
    @include('components.header')
    
    <div class="flex min-h-screen">
        @include('components.sidebar')
        
        <main class="flex-1 lg:ml-64 pt-4">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-8">
                {{ $slot }}
            </div>
        </main>
    </div>
    
    <!-- Search Overlay -->
    <div x-show="searchOpen" 
         x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         class="fixed inset-0 z-50 bg-gray-900/50 backdrop-blur-sm"
         @click="searchOpen = false">
        <div class="flex min-h-screen items-start justify-center p-4 pt-20">
            <div class="w-full max-w-2xl bg-white rounded-2xl shadow-2xl" @click.stop>
                <div class="p-6">
                    <input type="text" 
                           placeholder="Search discussions, students, resources..."
                           class="w-full border-0 bg-transparent text-lg focus:ring-0"
                           @keydown.escape="searchOpen = false">
                </div>
            </div>
        </div>
    </div>
    
    <style>[x-cloak] { display: none !important; }</style>
</body>
</html>
