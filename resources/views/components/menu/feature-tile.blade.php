@props(['item', 'variant' => 'cohort'])

<a 
    href="{{ $item['url'] ?? '#' }}"
    class="group relative flex flex-col p-5 rounded-xl border border-gray-200 hover:border-indigo-300 hover:shadow-md transition-all duration-200 bg-white"
    role="menuitem"
>
    {{-- Badge or Icon --}}
    <div class="mb-3">
        @if(!empty($item['badge']))
            {{-- Badge Circle (for Cohorts) --}}
            <div class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-indigo-100 text-indigo-600 font-bold text-lg group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-200">
                {{ $item['badge'] }}
            </div>
        @elseif(!empty($item['icon']))
            {{-- Icon (for Community) --}}
            <div class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-indigo-50 text-indigo-600 group-hover:bg-indigo-100 transition-colors duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    @if(str_contains($item['icon'], 'chat'))
                        {{-- Chat icon --}}
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    @elseif(str_contains($item['icon'], 'calendar'))
                        {{-- Calendar icon --}}
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    @elseif(str_contains($item['icon'], 'star'))
                        {{-- Star icon --}}
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                    @else
                        {{-- Default icon --}}
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    @endif
                </svg>
            </div>
        @endif
    </div>

    {{-- Title --}}
    <h3 class="text-base font-semibold text-gray-900 group-hover:text-indigo-600 transition-colors duration-150 mb-2">
        {{ $item['title'] }}
    </h3>

    {{-- Description --}}
    @if(!empty($item['description']))
        <p class="text-sm text-gray-600 mb-4 flex-grow">
            {{ $item['description'] }}
        </p>
    @endif

    {{-- CTA --}}
    @if(!empty($item['cta_text']))
        <div class="flex items-center text-sm font-medium text-indigo-600 group-hover:text-indigo-700">
            <span>{{ $item['cta_text'] }}</span>
            <svg class="ml-1 w-4 h-4 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </div>
    @endif
</a>