<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Edumark' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    
    {{-- Header (sticky, самый верхний) --}}
    <x-header />
    
    {{-- Sidebar (fixed слева) --}}
    @include('partials.sidebar')
    
    {{-- Main Content (с отступом слева для sidebar) --}}
    <main class="ml-64 pt-[104px] min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            {{ $slot }}
        </div>
    </main>

</body>
</html>
