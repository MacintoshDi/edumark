<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edumark - @yield('title')</title>

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background font-sans text-copy-light antialiased h-full">
    <div class="min-h-full flex flex-col justify-center items-center px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div>
                 <a href="{{ route('home') }}" class="flex justify-center items-center gap-2">
                    <img class="h-10 w-auto" src="{{ asset('assets/images/bettermode-icon.png') }}" alt="Edumark Logo">
                    <span class="font-extrabold text-2xl text-copy">Edumark</span>
                </a>
                <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-copy">
                    @yield('heading')
                </h2>
            </div>
            
            <div class="bg-surface p-8 rounded-lg shadow-card">
                 @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
