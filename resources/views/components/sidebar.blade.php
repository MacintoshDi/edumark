<aside class="w-64 bg-gray-50 border-r border-gray-200 min-h-screen fixed left-0 top-16 overflow-y-auto pb-20">
    <nav class="p-4 space-y-1">
        
        {{-- Welcome --}}
        <a href="{{ route('home') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-200 transition-colors {{ request()->routeIs('home') ? 'bg-gray-200' : '' }}">
            <div class="w-6 h-6 bg-indigo-500 rounded flex items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
            </div>
            <span class="text-sm font-medium text-gray-900">Welcome</span>
        </a>

        {{-- Student Directory --}}
        <a href="{{ route('student-directory') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-200 transition-colors {{ request()->routeIs('student-directory') ? 'bg-gray-200' : '' }}">
            <div class="w-6 h-6 bg-indigo-500 rounded flex items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>
            <span class="text-sm font-medium text-gray-900">Student Directory</span>
        </a>

        {{-- Academy Section --}}
        <div class="pt-4">
            <div class="px-3 py-2 text-xs font-semibold text-gray-500 uppercase">Academy</div>
            
            <a href="{{ route('cohorts.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-200 transition-colors {{ request()->routeIs('cohorts.index') ? 'bg-gray-200' : '' }}">
                <div class="w-6 h-6 bg-indigo-500 rounded flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <span class="text-sm font-medium text-gray-900">Cohorts</span>
            </a>

            <a href="{{ route('ask-your-teacher') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-200 transition-colors {{ request()->routeIs('ask-your-teacher') ? 'bg-gray-200' : '' }}">
                <div class="w-6 h-6 bg-indigo-500 rounded flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <span class="text-sm font-medium text-gray-900">Ask Your Teacher</span>
            </a>
        </div>

        {{-- Cohorts Section --}}
        <div class="pt-4">
            <div class="px-3 py-2 text-xs font-semibold text-gray-500 uppercase">Cohorts</div>
            
            <a href="{{ route('cohorts.growth-marketing') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-200 transition-colors {{ request()->routeIs('cohorts.growth-marketing') ? 'bg-gray-200' : '' }}">
                <div class="w-6 h-6 bg-indigo-500 rounded flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                    1
                </div>
                <span class="text-sm font-medium text-gray-900">Cohort 1: Growth Marketing</span>
            </a>

            <a href="{{ route('cohorts.advanced-seo') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-200 transition-colors {{ request()->routeIs('cohorts.advanced-seo') ? 'bg-gray-200' : '' }}">
                <div class="w-6 h-6 bg-indigo-500 rounded flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                    2
                </div>
                <span class="text-sm font-medium text-gray-900">Cohort 2: Advanced SEO</span>
            </a>

            <a href="{{ route('cohorts.video-marketing') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-200 transition-colors {{ request()->routeIs('cohorts.video-marketing') ? 'bg-gray-200' : '' }}">
                <div class="w-6 h-6 bg-indigo-500 rounded flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                    3
                </div>
                <span class="text-sm font-medium text-gray-900">Cohort 3: Video Marketing</span>
            </a>

            <a href="{{ route('cohorts.content-marketing') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-200 transition-colors {{ request()->routeIs('cohorts.content-marketing') ? 'bg-gray-200' : '' }}">
                <div class="w-6 h-6 bg-indigo-500 rounded flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                    4
                </div>
                <span class="text-sm font-medium text-gray-900">Cohort 4: Content Marketing</span>
            </a>
        </div>

        {{-- Community Section --}}
        <div class="pt-4">
            <div class="px-3 py-2 text-xs font-semibold text-gray-500 uppercase">Community</div>
            
            <a href="{{ route('discussion') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-200 transition-colors {{ request()->routeIs('discussion') ? 'bg-gray-200' : '' }}">

                <div class="w-6 h-6 bg-indigo-500 rounded flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                </div>
                <span class="text-sm font-medium text-gray-900">Discussion</span>
            </a>

            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-200 transition-colors">
                <div class="w-6 h-6 bg-indigo-500 rounded flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <span class="text-sm font-medium text-gray-900">Events</span>
            </a>

            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-200 transition-colors">
                <div class="w-6 h-6 bg-indigo-500 rounded flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                    </svg>
                </div>
                <span class="text-sm font-medium text-gray-900">Spotlight</span>
            </a>

            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-200 transition-colors">
                <div class="w-6 h-6 bg-indigo-500 rounded flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <span class="text-sm font-medium text-gray-900">Connect</span>
            </a>

            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-200 transition-colors">
                <div class="w-6 h-6 bg-indigo-500 rounded flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <span class="text-sm font-medium text-gray-900">Showcase</span>
            </a>
        </div>

    </nav>

    {{-- Copyright --}}
    <div class="absolute bottom-0 left-0 right-0 p-4 text-center text-xs text-gray-500">
        © Copyright 2025
    </div>
</aside>
