<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Edumark' }} - Learning Community</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
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
    
    <style>[x-cloak] { display: none !important; }</style>
</body>
</html>
