@props(['item', 'menuId'])

<div
    x-show="openMenuId === '{{ $item['id'] }}'"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 translate-y-1"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 translate-y-1"
    class="absolute left-0 mt-2 w-screen max-w-7xl"
    style="display: none;"
    id="{{ $menuId }}"
    role="menu"
    aria-labelledby="menu-button-{{ $item['id'] }}"
    @mouseenter="openMenu('{{ $item['id'] }}')"
    @mouseleave="scheduleClose('{{ $item['id'] }}')"
>
    <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden bg-white">
        <div class="p-6">
            @if($item['title'] === 'Cohorts')
                {{-- Cohorts Grid Layout --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    @foreach($item['children'] ?? [] as $child)
                        @if($child['type'] === 'feature-tile')
                            <x-menu.feature-tile :item="$child" />
                        @elseif($child['type'] === 'link')
                            {{-- Browse all cohorts link --}}
                            <a 
                                href="{{ $child['url'] ?? '#' }}"
                                class="flex items-center p-4 rounded-lg hover:bg-gray-50 transition-colors duration-150 border border-gray-200"
                                role="menuitem"
                            >
                                @if(!empty($child['icon']))
                                    <svg class="w-5 h-5 text-indigo-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                                    </svg>
                                @endif
                                <span class="text-sm font-medium text-gray-900">{{ $child['title'] }}</span>
                            </a>
                        @endif
                    @endforeach
                </div>
            
            @elseif($item['title'] === 'Community')
                {{-- Community 3-Column Layout --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach($item['children'] ?? [] as $child)
                        @if($child['type'] === 'feature-tile')
                            <x-menu.feature-tile :item="$child" variant="community" />
                        @endif
                    @endforeach
                </div>
            
            @else
                {{-- Generic Dropdown for other mega menus --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach($item['children'] ?? [] as $child)
                        <a 
                            href="{{ $child['url'] ?? '#' }}"
                            class="block p-4 rounded-lg hover:bg-gray-50 transition-colors duration-150"
                            role="menuitem"
                        >
                            <div class="text-sm font-medium text-gray-900">{{ $child['title'] }}</div>
                            @if(!empty($child['description']))
                                <div class="mt-1 text-xs text-gray-500">{{ $child['description'] }}</div>
                            @endif
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>