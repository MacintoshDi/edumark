<aside class="fixed left-0 top-[104px] bottom-0 w-64 bg-white border-r border-gray-200 overflow-y-auto z-40 hide-scrollbar">
    <nav class="p-4">
        
        {{-- Welcome --}}
        <a href="{{ route('home') }}" 
           class="flex items-center gap-3 px-3 py-2 rounded-lg transition-colors mb-1 {{ request()->routeIs('home') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-700 hover:bg-gray-50' }}">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            <span class="text-sm font-medium">Welcome</span>
        </a>

        {{-- Student Directory --}}
        <a href="{{ route('student-directory') }}" 
           class="flex items-center gap-3 px-3 py-2 rounded-lg transition-colors mb-1 {{ request()->routeIs('student-directory') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-700 hover:bg-gray-50' }}">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
            <span class="text-sm font-medium">Student Directory</span>
        </a>

        {{-- ACADEMY --}}
        <div class="mt-6 mb-2">
            <div class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Academy</div>
        </div>

        <a href="{{ route('cohorts.index') }}" 
           class="flex items-center gap-3 px-3 py-2 rounded-lg transition-colors mb-1 {{ request()->routeIs('cohorts.index') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-700 hover:bg-gray-50' }}">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>
            <span class="text-sm font-medium">Cohorts</span>
        </a>

        <a href="{{ route('ask-your-teacher') }}" 
           class="flex items-center gap-3 px-3 py-2 rounded-lg transition-colors mb-1 {{ request()->routeIs('ask-your-teacher') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-700 hover:bg-gray-50' }}">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span class="text-sm font-medium">Ask Your Teacher</span>
        </a>

        {{-- COHORTS --}}
        <div class="mt-6 mb-2">
            <div class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Cohorts</div>
        </div>

        <a href="{{ route('cohorts.growth-marketing') }}" 
           class="flex items-center gap-3 px-3 py-2 rounded-lg transition-colors mb-1 {{ request()->routeIs('cohorts.growth-marketing') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-700 hover:bg-gray-50' }}">
            <div class="w-6 h-6 bg-indigo-600 text-white rounded flex items-center justify-center text-xs font-bold flex-shrink-0">1</div>
            <span class="text-sm font-medium leading-tight">Cohort 1: Growth Marketing</span>
        </a>

        <a href="{{ route('cohorts.advanced-seo') }}" 
           class="flex items-center gap-3 px-3 py-2 rounded-lg transition-colors mb-1 {{ request()->routeIs('cohorts.advanced-seo') ? 'bg-purple-50 text-purple-600' : 'text-gray-700 hover:bg-gray-50' }}">
            <div class="w-6 h-6 bg-purple-600 text-white rounded flex items-center justify-center text-xs font-bold flex-shrink-0">2</div>
            <span class="text-sm font-medium leading-tight">Cohort 2: Advanced SEO</span>
        </a>

        <a href="{{ route('cohorts.video-marketing') }}" 
           class="flex items-center gap-3 px-3 py-2 rounded-lg transition-colors mb-1 {{ request()->routeIs('cohorts.video-marketing') ? 'bg-pink-50 text-pink-600' : 'text-gray-700 hover:bg-gray-50' }}">
            <div class="w-6 h-6 bg-pink-600 text-white rounded flex items-center justify-center text-xs font-bold flex-shrink-0">3</div>
            <span class="text-sm font-medium leading-tight">Cohort 3: Video Marketing</span>
        </a>

        <a href="{{ route('cohorts.content-marketing') }}" 
           class="flex items-center gap-3 px-3 py-2 rounded-lg transition-colors mb-1 {{ request()->routeIs('cohorts.content-marketing') ? 'bg-orange-50 text-orange-600' : 'text-gray-700 hover:bg-gray-50' }}">
            <div class="w-6 h-6 bg-orange-600 text-white rounded flex items-center justify-center text-xs font-bold flex-shrink-0">4</div>
            <span class="text-sm font-medium leading-tight">Cohort 4: Content Marketing</span>
        </a>

        {{-- COMMUNITY --}}
        <div class="mt-6 mb-2">
            <div class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Community</div>
        </div>

        <a href="{{ route('discussion') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors mb-1">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
            </svg>
            <span class="text-sm font-medium">Discussion</span>
        </a>

        <a href="{{ route('events') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors mb-1">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <span class="text-sm font-medium">Events</span>
        </a>

        <a href="{{ route('spotlight') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors mb-1">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
            </svg>
            <span class="text-sm font-medium">Spotlight</span>
        </a>

        <a href="{{ route('connect') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors mb-1">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
            </svg>
            <span class="text-sm font-medium">Connect</span>
        </a>

        <a href="{{ route('showcase') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors mb-1">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <span class="text-sm font-medium">Showcase</span>
        </a>

    </nav>
</aside>
