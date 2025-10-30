@props(['menuItems' => []])

<header 
    class="bg-white border-b border-gray-200 sticky top-0 z-50"
    x-data="headerMenu()"
    @keydown.escape.window="closeAll(); closeMobile()"
    @click.outside="closeAll()"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            {{-- Mobile Menu Button (visible < 1024px) --}}
            <button
                type="button"
                @click="toggleMobile()"
                class="lg:hidden p-2 rounded-md text-gray-700 hover:text-indigo-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 transition-colors duration-150"
                :aria-expanded="mobileOpen.toString()"
                aria-controls="mobile-menu"
                aria-label="Toggle mobile menu"
            >
                <svg class="h-6 w-6" :class="{ 'hidden': mobileOpen, 'block': !mobileOpen }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg class="h-6 w-6" :class="{ 'block': mobileOpen, 'hidden': !mobileOpen }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            {{-- Logo --}}
            <div class="flex-shrink-0">
                <a href="/" class="flex items-center space-x-2 group">
                    <svg class="w-8 h-8 text-indigo-600 group-hover:text-indigo-700 transition-colors duration-150" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5zm0 2.18l8 3.6v9.22c0 4.38-2.91 8.46-8 9.83-5.09-1.37-8-5.45-8-9.83V7.78l8-3.6zM11 7v2h2V7h-2zm0 4v6h2v-6h-2z"/>
                    </svg>
                    <span class="text-xl font-bold text-gray-900 group-hover:text-indigo-600 transition-colors duration-150">
                        Edumark
                    </span>
                </a>
            </div>

            {{-- Desktop Navigation (visible >= 1024px) --}}
            <nav class="hidden lg:flex lg:items-center lg:space-x-1" role="menubar">
                @foreach($menuItems as $item)
                    @if($item['type'] === 'mega' || $item['type'] === 'dropdown')
                        {{-- Mega/Dropdown Menu --}}
                        <div 
                            class="relative"
                            @mouseenter="openMenu('{{ $item['id'] }}')"
                            @mouseleave="scheduleClose()"
                        >
                            <button
                                id="menu-button-{{ $item['id'] }}"
                                type="button"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-indigo-600 hover:bg-gray-50 rounded-md transition-all duration-150 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                :aria-expanded="(openMenuId === '{{ $item['id'] }}').toString()"
                                aria-controls="menu-{{ $item['id'] }}"
                                role="menuitem"
                                :class="{ 'text-indigo-600 bg-gray-50': openMenuId === '{{ $item['id'] }}' }"
                            >
                                {{ $item['title'] }}
                                <svg class="ml-1 h-4 w-4 transition-transform duration-150" :class="{ 'rotate-180': openMenuId === '{{ $item['id'] }}' }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            {{-- Mega Dropdown Panel --}}
                            <div
                                x-show="openMenuId === '{{ $item['id'] }}'"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 translate-y-1"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 translate-y-1"
                                id="menu-{{ $item['id'] }}"
                                class="absolute left-0 mt-2 w-screen max-w-md transform"
                                role="menu"
                                aria-labelledby="menu-button-{{ $item['id'] }}"
                                @mouseenter="cancelClose()"
                                @mouseleave="scheduleClose()"
                                style="display: none;"
                            >
                                <div class="overflow-hidden rounded-lg shadow-lg ring-1 ring-black ring-opacity-5">
                                    <div class="relative bg-white p-6">
                                        @if(!empty($item['children']))
                                            @if($item['type'] === 'mega' && count(array_filter($item['children'], fn($c) => $c['type'] === 'feature-tile')) > 0)
                                                {{-- Mega Menu Grid (for Cohorts/Community) --}}
                                                <div class="grid gap-4 @if(count($item['children']) > 3) grid-cols-2 @else grid-cols-1 @endif">
                                                    @foreach($item['children'] as $child)
                                                        @if($child['type'] === 'feature-tile')
                                                            
                                                                href="{{ $child['url'] }}"
                                                                target="{{ $child['target'] }}"
                                                                @if($child['target'] === '_blank') rel="noopener noreferrer" @endif
                                                                class="group flex items-start p-3 rounded-lg hover:bg-gray-50 transition-colors duration-150"
                                                                role="menuitem"
                                                            >
                                                                <div class="flex-shrink-0">
                                                                    @if(!empty($child['badge']))
                                                                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-indigo-600 text-white font-semibold text-sm group-hover:bg-indigo-700 transition-colors duration-150">
                                                                            {{ $child['badge'] }}
                                                                        </div>
                                                                    @elseif(!empty($child['icon']))
                                                                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-indigo-100 text-indigo-600 group-hover:bg-indigo-200 transition-colors duration-150">
                                                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                                            </svg>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                <div class="ml-4 flex-1">
                                                                    <p class="text-sm font-medium text-gray-900 group-hover:text-indigo-600">
                                                                        {{ $child['title'] }}
                                                                    </p>
                                                                    @if(!empty($child['description']))
                                                                        <p class="mt-1 text-xs text-gray-500">
                                                                            {{ $child['description'] }}
                                                                        </p>
                                                                    @endif
                                                                    @if(!empty($child['cta_text']))
                                                                        <p class="mt-2 text-xs font-medium text-indigo-600 group-hover:text-indigo-700">
                                                                            {{ $child['cta_text'] }} →
                                                                        </p>
                                                                    @endif
                                                                </div>
                                                            </a>
                                                        @else
                                                            {{-- Regular link (like "Browse all cohorts") --}}
                                                            
                                                                href="{{ $child['url'] }}"
                                                                target="{{ $child['target'] }}"
                                                                @if($child['target'] === '_blank') rel="noopener noreferrer" @endif
                                                                class="col-span-full flex items-center p-3 text-sm font-medium text-indigo-600 hover:text-indigo-700 hover:bg-indigo-50 rounded-lg transition-colors duration-150"
                                                                role="menuitem"
                                                            >
                                                                @if(!empty($child['icon']))
                                                                    <svg class="mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                                    </svg>
                                                                @endif
                                                                {{ $child['title'] }}
                                                            </a>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            @else
                                                {{-- Simple Dropdown List --}}
                                                <div class="space-y-1">
                                                    @foreach($item['children'] as $child)
                                                        
                                                            href="{{ $child['url'] }}"
                                                            target="{{ $child['target'] }}"
                                                            @if($child['target'] === '_blank') rel="noopener noreferrer" @endif
                                                            class="block px-4 py-2 text-sm text-gray-700 hover:text-indigo-600 hover:bg-gray-50 rounded-md transition-colors duration-150"
                                                            role="menuitem"
                                                        >
                                                            {{ $child['title'] }}
                                                        </a>
                                                    @endforeach
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif($item['type'] === 'button')
                        {{-- Button (like Search) --}}
                        <button
                            type="button"
                            @click="handleAction('{{ $item['meta']['action'] ?? '' }}')"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-indigo-600 hover:bg-gray-50 rounded-md transition-all duration-150 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            role="menuitem"
                            aria-label="{{ $item['title'] }}"
                        >
                            @if(!empty($item['icon']))
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            @else
                                {{ $item['title'] }}
                            @endif
                        </button>
                    @else
                        {{-- Regular Link --}}
                        
                            href="{{ $item['url'] }}"
                            target="{{ $item['target'] }}"
                            @if($item['target'] === '_blank') rel="noopener noreferrer" @endif
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-indigo-600 hover:bg-gray-50 rounded-md transition-all duration-150 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            role="menuitem"
                        >
                            {{ $item['title'] }}
                        </a>
                    @endif
                @endforeach
            </nav>
        </div>
    </div>

    {{-- Mobile Panel --}}
    <x-menu.mobile-panel :menuItems="$menuItems" />
</header>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('headerMenu', () => ({
        openMenuId: null,
        closeTimeout: null,
        mobileOpen: false,
        expandedIds: [],
        mobileFocusTrap: null,
        lastFocusedElement: null,

        init() {
            // Cleanup event listener on destroy
            this.$watch('mobileOpen', (value) => {
                if (!value && this.mobileFocusTrap) {
                    document.removeEventListener('keydown', this.mobileFocusTrap);
                    this.mobileFocusTrap = null;
                }
            });
        },

        // Desktop Menu Methods
        openMenu(id) {
            this.cancelClose();
            this.openMenuId = id;
        },

        closeAll() {
            this.openMenuId = null;
        },

        scheduleClose() {
            this.closeTimeout = setTimeout(() => {
                this.closeAll();
            }, 150);
        },

        cancelClose() {
            if (this.closeTimeout) {
                clearTimeout(this.closeTimeout);
                this.closeTimeout = null;
            }
        },

        // Mobile Menu Methods
        toggleMobile() {
            if (this.mobileOpen) {
                this.closeMobile();
            } else {
                this.openMobile();
            }
        },

        openMobile() {
            this.mobileOpen = true;
            this.lastFocusedElement = document.activeElement;
            
            // Use global lock function for better scrollbar handling
            if (typeof window.lockBodyScroll === 'function') {
                window.lockBodyScroll();
            } else {
                document.body.style.overflow = 'hidden';
            }
            
            // Set focus to first interactive element in panel
            this.$nextTick(() => {
                const panel = document.getElementById('mobile-menu');
                const firstButton = panel?.querySelector('button, a');
                if (firstButton) {
                    firstButton.focus();
                }
                this.setupFocusTrap();
            });
        },

        closeMobile() {
            this.mobileOpen = false;
            this.expandedIds = [];
            
            // Use global unlock function for better scrollbar handling
            if (typeof window.unlockBodyScroll === 'function') {
                window.unlockBodyScroll();
            } else {
                document.body.style.overflow = '';
            }
            
            // Return focus to burger button
            if (this.lastFocusedElement) {
                this.lastFocusedElement.focus();
            }
        },

        toggleExpanded(id) {
            const index = this.expandedIds.indexOf(id);
            if (index > -1) {
                this.expandedIds.splice(index, 1);
            } else {
                this.expandedIds.push(id);
            }
        },

        isExpanded(id) {
            return this.expandedIds.includes(id);
        },

        setupFocusTrap() {
            const panel = document.getElementById('mobile-menu');
            if (!panel) return;

            const focusableElements = panel.querySelectorAll(
                'button:not([disabled]), a[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), [tabindex]:not([tabindex="-1"])'
            );

            if (focusableElements.length === 0) return;

            const firstElement = focusableElements[0];
            const lastElement = focusableElements[focusableElements.length - 1];

            // Tab trap
            this.mobileFocusTrap = (e) => {
                if (e.key !== 'Tab') return;

                if (e.shiftKey) {
                    if (document.activeElement === firstElement) {
                        lastElement.focus();
                        e.preventDefault();
                    }
                } else {
                    if (document.activeElement === lastElement) {
                        firstElement.focus();
                        e.preventDefault();
                    }
                }
            };

            document.addEventListener('keydown', this.mobileFocusTrap);
        },

        // Action Handler
        handleAction(action) {
            if (action === 'open-search') {
                console.log('Search action triggered');
                // TODO: Implement search modal in future step
            }
        }
    }));
});
</script>