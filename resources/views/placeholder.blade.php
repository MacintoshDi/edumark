<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Page' }} - Edumark</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-50">
    {{-- Header Navigation --}}
    <x-menu.header-nav :menuItems="[]" />

    {{-- Content --}}
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-gray-900">
                {{ $title ?? 'Page' }}
            </h1>
            <p class="mt-3 text-base text-gray-500 max-w-2xl mx-auto">
                {{ $description ?? 'This is a placeholder page.' }}
            </p>
            <div class="mt-8">
                <a href="/" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    ← Back to Home
                </a>
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