{{-- Фиолетовая полоса --}}
<div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-white text-center py-2 text-sm">
    <a href="https://www.figma.com" target="_blank" class="hover:underline">
        Edumark Template 👉 Download Design Assets Style Guide in Figma →
    </a>
</div>

{{-- Header --}}
<header class="bg-white border-b border-gray-200 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"/>
                    </svg>
                </div>
                <span class="text-xl font-bold text-gray-900">edumark</span>
            </a>

            {{-- Navigation --}}
            <nav class="hidden md:flex items-center gap-8">
                
                {{-- Cohorts Button --}}
                <button data-dropdown-button="cohorts-menu" class="flex items-center gap-1 text-gray-700 hover:text-indigo-600 font-medium transition-colors">
                    Cohorts
                    <svg class="w-4 h-4 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                {{-- Community Button --}}
                <button data-dropdown-button="community-menu" class="flex items-center gap-1 text-gray-700 hover:text-indigo-600 font-medium transition-colors">
                    Community
                    <svg class="w-4 h-4 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <a href="{{ route('connect') }}" class="text-gray-700 hover:text-indigo-600 font-medium transition-colors">Connect</a>
                <a href="{{ route('ask-your-teacher') }}" class="text-gray-700 hover:text-indigo-600 font-medium transition-colors">Ask Your Teacher</a>
            </nav>

            {{-- Right --}}
            <div class="flex items-center gap-4">
                <button class="p-2 text-gray-600 hover:text-indigo-600 transition-colors">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>
                <a href="{{ route('login') }}" class="px-4 py-2 text-gray-700 hover:text-indigo-600 font-medium transition-colors">
                    Log in
                </a>
            </div>
        </div>
    </div>

    {{-- Cohorts Dropdown Menu --}}
    <div id="cohorts-menu" data-dropdown-menu class="hidden absolute left-0 right-0 bg-white border-b border-gray-200 shadow-lg z-30">
        <div class="max-w-7xl mx-auto px-8 py-8 ml-64">
            <div class="grid grid-cols-3 gap-6 mb-6">
                <a href="{{ route('cohorts.growth-marketing') }}" class="flex gap-4 p-4 border border-gray-200 rounded-xl hover:border-indigo-500 transition-all">
                    <div class="w-12 h-12 bg-indigo-600 text-white rounded-lg flex items-center justify-center text-xl font-bold flex-shrink-0">1</div>
                    <div>
                        <div class="text-xs text-indigo-600 font-medium mb-1">Cohort 1</div>
                        <h3 class="font-bold text-sm text-gray-900 mb-1">Growth Marketing</h3>
                        <p class="text-xs text-gray-600">Elevate your skills with cutting-edge strategies for unparalleled growth success</p>
                    </div>
                </a>

                <a href="{{ route('cohorts.advanced-seo') }}" class="flex gap-4 p-4 border border-gray-200 rounded-xl hover:border-purple-500 transition-all">
                    <div class="w-12 h-12 bg-purple-600 text-white rounded-lg flex items-center justify-center text-xl font-bold flex-shrink-0">2</div>
                    <div>
                        <div class="text-xs text-purple-600 font-medium mb-1">Cohort 2</div>
                        <h3 class="font-bold text-sm text-gray-900 mb-1">Advanced SEO</h3>
                        <p class="text-xs text-gray-600">Master the art of SEO with expert techniques for top rankings</p>
                    </div>
                </a>

                <a href="{{ route('cohorts.video-marketing') }}" class="flex gap-4 p-4 border border-gray-200 rounded-xl hover:border-pink-500 transition-all">
                    <div class="w-12 h-12 bg-pink-600 text-white rounded-lg flex items-center justify-center text-xl font-bold flex-shrink-0">3</div>
                    <div>
                        <div class="text-xs text-pink-600 font-medium mb-1">Cohort 3</div>
                        <h3 class="font-bold text-sm text-gray-900 mb-1">Video Marketing</h3>
                        <p class="text-xs text-gray-600">Harness the power of video to engage, inspire, and convert</p>
                    </div>
                </a>
            </div>

            <div class="grid grid-cols-3 gap-6">
                <a href="{{ route('cohorts.content-marketing') }}" class="flex gap-4 p-4 border border-gray-200 rounded-xl hover:border-orange-500 transition-all">
                    <div class="w-12 h-12 bg-orange-600 text-white rounded-lg flex items-center justify-center text-xl font-bold flex-shrink-0">4</div>
                    <div>
                        <div class="text-xs text-orange-600 font-medium mb-1">Cohort 4</div>
                        <h3 class="font-bold text-sm text-gray-900 mb-1">Content Marketing</h3>
                        <p class="text-xs text-gray-600">Create compelling content that captivates audiences</p>
                    </div>
                </a>

                <a href="{{ route('cohorts.index') }}" class="flex gap-4 p-4 border border-gray-200 rounded-xl hover:border-indigo-500 transition-all col-span-2">
                    <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-sm text-gray-900 mb-1">Browse all cohorts</h3>
                        <p class="text-xs text-gray-600">Click here to browse all the cohorts offered in the Edumark course programs.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    {{-- Community Dropdown Menu --}}
    <div id="community-menu" data-dropdown-menu class="hidden absolute left-0 right-0 bg-white border-b border-gray-200 shadow-lg z-30">
        <div class="max-w-7xl mx-auto px-8 py-8 ml-64">
            <div class="grid grid-cols-3 gap-6">
                <a href="{{ route('discussion') }}" class="flex gap-4 p-5 border border-gray-200 rounded-xl hover:border-indigo-500 transition-all">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-sm text-gray-900 mb-1">Discussion</h3>
                        <p class="text-xs text-gray-600">Have questions, need feedback, or want to share marketing resources? You're in the right place!</p>
                    </div>
                </a>

                <a href="{{ route('events') }}" class="flex gap-4 p-5 border border-gray-200 rounded-xl hover:border-indigo-500 transition-all">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-sm text-gray-900 mb-1">Events</h3>
                        <p class="text-xs text-gray-600">Join one of our monthly events to share and learn knowledge about all things marketing.</p>
                    </div>
                </a>

                <a href="{{ route('spotlight') }}" class="flex gap-4 p-5 border border-gray-200 rounded-xl hover:border-indigo-500 transition-all">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-sm text-gray-900 mb-1">Spotlight</h3>
                        <p class="text-xs text-gray-600">Come and join us in giving a big round of applause for our amazing colleagues!</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</header>
