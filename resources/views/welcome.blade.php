{{-- resources/views/welcome.blade.php --}}
<x-layouts.app :main-menu="isset($mainMenu) ? $mainMenu : []" :device="isset($device) ? $device : 'desktop'">
    <section class="hero">
        <h1>Добро пожаловать в Edumark</h1>
        <p>Управляйте меню и учебным контентом через Filament админ-панель.</p>
    </section>
</x-layouts.app>
