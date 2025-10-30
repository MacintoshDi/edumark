@props(['menuItems' => []])

{{-- Mobile Menu Overlay & Panel --}}
<div
    x-show="mobileOpen"
    x-transition:enter="transition-opacity ease-linear duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition-opacity ease-linear duration-300"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    @click="closeMobile()"
    class="fixed inset-0 bg-gray-600 bg-opacity-75 z-40 lg:hidden"
    style="display: none;"
    aria-hidden="true"
></div>

<div
    x-show="mobileOpen"
    x-transition:enter="transition ease-in-out duration-300 transform"
    x-transition:enter-start="-translate-x-full"
    x-transition:enter-end="translate-x-0"
    x-transition:leave="transition ease-in-out duration-300 transform"
    x-transition:leave-start="translate-x-0"
    x-transition:leave-end="-translate-x-full"
    id="mobile-menu"
    class="fixed inset-y-0 left-0 w-full max-w-sm bg-white shadow-xl z-50 lg:hidden overflow-y-auto"
    role="dialog"
    aria-modal="true"
    aria-labelledby="mobile-menu-heading"
    style="display: none;"
    @click.stop
>
    <div class="flex flex-col h-full">
        {{-- Header --}}
        <div class="flex items-center justify-between p-4 border-b border-gray-200">
            <h2 id="mobile-menu-heading" class="text-lg font-semibold text-gray-900">
                Menu
            </h2>
            <button
                type="button"
                @click="closeMobile()"
                class="p-2 rounded-md text-gray-700 hover:text-indigo-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 transition-colors duration-150"
                aria-label="Close menu"
            >
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- Navigation Items --}}
        <nav class="flex-1 px-4 py-6 space-y-1" role="navigation">
            @foreach($menuItems as $item)
                @if($item['type'] === 'mega' || $item['type'] === 'dropdown')
                    {{-- Expandable Section (Accordion) --}}
                    <div class="space-y-1">
                        <button
                            type="button"
                            @click="toggleExpanded('{{ $item['id'] }}')"
                            class="w-full flex items-center justify-between px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-50 hover:text-indigo-600 rounded-md transition-colors duration-150 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            :aria-expanded="isExpanded('{{ $item['id'] }}').toString()"
                            aria-controls="mobile-submenu-{{ $item['id'] }}"
                        >
                            <span class="flex items-center">
                                @if(!empty($item['icon']))
                                    <svg class="mr-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                @endif
                                {{ $item['title'] }}
                            </span>
                            <svg 
                                class="h-5 w-5 text-gray-400 transition-transform duration-200" 
                                :class="{ 'rotate-180': isExpanded('{{ $item['id'] }}') }"
                                fill="none" 
                                viewBox="0 0 24 24" 
                                stroke="currentColor"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        {{-- Submenu --}}
                        <div
                            x-show="isExpanded('{{ $item['id'] }}')"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-2"
                            id="mobile-submenu-{{ $item['id'] }}"
                            class="pl-4 space-y-1"
                            style="display: none;"
                        >
                            @if(!empty($item['children']))
                                @foreach($item['children'] as $child)
                                    
                                        href="{{ $child['url'] }}"
                                        target="{{ $child['target'] }}"
                                        @if($child['target'] === '_blank') rel="noopener noreferrer" @endif
                                        @click="closeMobile()"
                                        class="group flex items-start px-3 py-2 text-sm text-gray-700 hover:text-indigo-600 hover:bg-gray-50 rounded-md transition-colors duration-150"
                                    >
                                        {{-- Icon or Badge --}}
                                        @if(!empty($child['badge']))
                                            <div class="flex-shrink-0 flex h-6 w-6 items-center justify-center rounded-full bg-indigo-100 text-indigo-600 text-xs font-semibold mr-3">
                                                {{ $child['badge'] }}
                                            </div>
                                        @elseif(!empty($child['icon']))
                                            <svg class="flex-shrink-0 mr-3 h-5 w-5 text-gray-400 group-hover:text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        @endif

                                        <div class="flex-1 min-w-0">
                                            <p class="font-medium text-gray-900 group-hover:text-indigo-600 truncate">
                                                {{ $child['title'] }}
                                            </p>
                                            @if(!empty($child['description']) && $child['type'] === 'feature-tile')
                                                <p class="mt-0.5 text-xs text-gray-500 line-clamp-2">
                                                    {{ $child['description'] }}
                                                </p>
                                            @endif
                                        </div>

                                        {{-- External link indicator --}}
                                        @if($child['target'] === '_blank')
                                            <svg class="flex-shrink-0 ml-2 h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                            </svg>
                                        @endif
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                @elseif($item['type'] === 'button')
                    {{-- Button (like Search) --}}
                    <button
                        type="button"
                        @click="handleAction('{{ $item['meta']['action'] ?? '' }}')"
                        class="w-full flex items-center px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-50 hover:text-indigo-600 rounded-md transition-colors duration-150 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    >
                        @if(!empty($item['icon']))
                            <svg class="mr-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        @endif
                        {{ $item['title'] }}
                    </button>
                @else
                    {{-- Regular Link --}}
                    
                        href="{{ $item['url'] }}"
                        target="{{ $item['target'] }}"
                        @if($item['target'] === '_blank') rel="noopener noreferrer" @endif
                        @click="closeMobile()"
                        class="flex items-center px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-50 hover:text-indigo-600 rounded-md transition-colors duration-150 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    >
                        @if(!empty($item['icon']))
                            <svg class="mr-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        @endif
                        {{ $item['title'] }}
                        @if($item['target'] === '_blank')
                            <svg class="ml-auto h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        @endif
                    </a>
                @endif
            @endforeach
        </nav>

        {{-- Footer --}}
        <div class="border-t border-gray-200 p-4">
            <p class="text-xs text-gray-500 text-center">
                © {{ date('Y') }} Edumark. All rights reserved.
            </p>
        </div>
    </div>
</div>