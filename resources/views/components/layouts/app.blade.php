<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Edumark') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="site-header">
        <x-menus.dynamic-menu :items="$mainMenu" :device="$device" class="site-header__menu" />
    </header>
    <main class="site-main">
        {{ $slot }}
    </main>
</body>
</html>