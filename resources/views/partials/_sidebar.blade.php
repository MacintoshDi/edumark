<!-- Desktop Sidebar -->
<aside class="hidden lg:fixed lg:inset-y-0 lg:z-30 lg:flex lg:w-64 lg:flex-col">
    <div class="flex grow flex-col gap-y-5 overflow-y-auto border-r border-border-color bg-surface px-4 py-4">
        <!-- Logo -->
        <div class="flex h-16 shrink-0 items-center gap-2 px-2">
            <img class="h-8 w-auto" src="{{ asset('assets/images/bettermode-icon.png') }}" alt="Edumark Logo">
            <span class="font-extrabold text-xl text-copy">Edumark</span>
        </div>

        <!-- Navigation -->
        <nav class="flex flex-1 flex-col">
            @include('partials.sidebar._navigation')
        </nav>
        <div class="mt-auto flex-shrink-0 pt-4 text-xs text-gray-500">
            © Copyright 2025 Edumark
        </div>
    </div>
</aside>

<!-- Mobile Sidebar -->
<div id="mobile-sidebar" class="fixed inset-y-0 left-0 z-40 w-64 transform -translate-x-full bg-surface transition-transform duration-300 ease-in-out lg:hidden">
    <div class="flex h-full flex-col">
        <div class="flex h-16 items-center justify-between border-b border-border-color px-4">
            <!-- Mobile Logo -->
             <div class="flex items-center gap-2">
                <img class="h-8 w-auto" src="{{ asset('assets/images/bettermode-icon.png') }}" alt="Edumark Logo">
                <span class="font-extrabold text-xl text-copy">Edumark</span>
            </div>
            <button id="sidebar-close-button" type="button" class="btn-icon">
                <span class="sr-only">Close menu</span>
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <div class="flex-1 overflow-y-auto p-4">
            <nav class="flex flex-1 flex-col">
                 @include('partials.sidebar._navigation')
            </nav>
        </div>
    </div>
</div>