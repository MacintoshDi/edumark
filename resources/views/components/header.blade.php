<!-- Main Header -->
<header class="bg-white border-b border-gray-200 sticky top-0 z-40" x-data="{
    cohortsOpen: false,
    communityOpen: false,
    connectOpen: false,
    closeAll() {
        this.cohortsOpen = false;
        this.communityOpen = false;
        this.connectOpen = false;
    }
}">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center gap-8">
                <button @click="mobileMenuOpen = !mobileMenuOpen" 
                        class="lg:hidden p-2 text-gray-600 hover:text-gray-900">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <img src="{{ asset('assets/images/bettermode-icon.png') }}" alt="Edumark" class="h-8 w-8">
                    <span class="text-xl font-bold text-gray-900">edumark</span>
                </a>
            </div>
            
            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center gap-1">
                <!-- Cohorts Dropdown -->
                <div class="relative" @mouseenter="closeAll(); cohortsOpen = true" @mouseleave="cohortsOpen = false">
                    <button class="flex items-center gap-1 px-4 py-2 text-sm font-medium text-gray-700 hover:text-indigo-600 rounded-lg hover:bg-gray-50 transition-colors">
                        Cohorts
                        <svg class="h-4 w-4 transition-transform" :class="{ 'rotate-180': cohortsOpen }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    
                    <!-- Cohorts Mega Menu -->
                    <div x-show="cohortsOpen"
                         x-cloak
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         class="absolute left-0 top-full mt-2 w-[800px] bg-white rounded-2xl shadow-2xl border border-gray-200 p-6">
                        
                        <div class="grid grid-cols-2 gap-6">
                            <!-- Cohort 1: Growth Marketing -->
                            <a href="{{ route('cohorts.growth-marketing') }}" class="group flex gap-4 p-4 rounded-xl hover:bg-indigo-50 transition-colors">
                                <img src="{{ asset('assets/images/cohort-growth-marketing.png') }}" alt="Growth Marketing" class="h-12 w-12 rounded-lg object-cover flex-shrink-0">
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center gap-2 mb-1">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">Cohort 1</span>
                                    </div>
                                    <h3 class="text-sm font-semibold text-gray-900 group-hover:text-indigo-600 mb-1">Growth Marketing</h3>
                                    <p class="text-xs text-gray-500 line-clamp-2">Elevate your skills with cutting-edge strategies for unparalleled growth success</p>
                                    <div class="flex items-center gap-3 mt-2 text-xs text-gray-500">
                                        <span>👥 3 members</span>
                                        <span>💬 10 posts</span>
                                    </div>
                                </div>
                            </a>
                            
                            <!-- Cohort 2: Advanced SEO -->
                            <a href="{{ route('cohorts.advanced-seo') }}" class="group flex gap-4 p-4 rounded-xl hover:bg-purple-50 transition-colors">
                                <img src="{{ asset('assets/images/cohort-advanced-seo.png') }}" alt="Advanced SEO" class="h-12 w-12 rounded-lg object-cover flex-shrink-0">
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center gap-2 mb-1">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">Cohort 2</span>
                                    </div>
                                    <h3 class="text-sm font-semibold text-gray-900 group-hover:text-purple-600 mb-1">Advanced SEO</h3>
                                    <p class="text-xs text-gray-500 line-clamp-2">Master the art of SEO with expert techniques for top rankings</p>
                                    <div class="flex items-center gap-3 mt-2 text-xs text-gray-500">
                                        <span>👥 3 members</span>
                                        <span>💬 5 posts</span>
                                    </div>
                                </div>
                            </a>
                            
                            <!-- Cohort 3: Video Marketing -->
                            <a href="{{ route('cohorts.video-marketing') }}" class="group flex gap-4 p-4 rounded-xl hover:bg-pink-50 transition-colors">
                                <img src="{{ asset('assets/images/cohort-video-marketing.png') }}" alt="Video Marketing" class="h-12 w-12 rounded-lg object-cover flex-shrink-0">
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center gap-2 mb-1">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-pink-100 text-pink-800">Cohort 3</span>
                                    </div>
                                    <h3 class="text-sm font-semibold text-gray-900 group-hover:text-pink-600 mb-1">Video Marketing</h3>
                                    <p class="text-xs text-gray-500 line-clamp-2">Harness the power of video to engage, inspire, and convert</p>
                                    <div class="flex items-center gap-3 mt-2 text-xs text-gray-500">
                                        <span>👥 3 members</span>
                                        <span>💬 5 posts</span>
                                    </div>
                                </div>
                            </a>
                            
                            <!-- Cohort 4: Content Marketing -->
                            <a href="{{ route('cohorts.content-marketing') }}" class="group flex gap-4 p-4 rounded-xl hover:bg-green-50 transition-colors">
                                <img src="{{ asset('assets/images/cohort-content-marketing.png') }}" alt="Content Marketing" class="h-12 w-12 rounded-lg object-cover flex-shrink-0">
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center gap-2 mb-1">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Cohort 4</span>
                                    </div>
                                    <h3 class="text-sm font-semibold text-gray-900 group-hover:text-green-600 mb-1">Content Marketing</h3>
                                    <p class="text-xs text-gray-500 line-clamp-2">Create compelling content that captivates audiences and drives results</p>
                                    <div class="flex items-center gap-3 mt-2 text-xs text-gray-500">
                                        <span>👥 3 members</span>
                                        <span>💬 5 posts</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <a href="{{ route('cohorts.index') }}" class="flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium text-indigo-600 hover:text-indigo-700 hover:bg-indigo-50 rounded-lg transition-colors">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                </svg>
                                Browse All Cohorts
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Community Dropdown -->
                <div class="relative" @mouseenter="closeAll(); communityOpen = true" @mouseleave="communityOpen = false">
                    <button class="flex items-center gap-1 px-4 py-2 text-sm font-medium text-gray-700 hover:text-indigo-600 rounded-lg hover:bg-gray-50 transition-colors">
                        Community
                        <svg class="h-4 w-4 transition-transform" :class="{ 'rotate-180': communityOpen }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    
                    <!-- Community Dropdown Menu -->
                    <div x-show="communityOpen"
                         x-cloak
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         class="absolute left-0 top-full mt-2 w-80 bg-white rounded-xl shadow-2xl border border-gray-200 p-4">
                        
                        <a href="{{ route('community.discussion') }}" class="flex items-start gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors group">
                            <div class="flex-shrink-0 w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center group-hover:bg-indigo-200 transition-colors">
                                <svg class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-sm font-semibold text-gray-900 mb-0.5">Discussion</h3>
                                <p class="text-xs text-gray-500">Have questions, need feedback, or want to share marketing resources?</p>
                            </div>
                        </a>
                        
                        <a href="{{ route('community.events') }}" class="flex items-start gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors group">
                            <div class="flex-shrink-0 w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center group-hover:bg-purple-200 transition-colors">
                                <svg class="h-5 w-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-sm font-semibold text-gray-900 mb-0.5">Events</h3>
                                <p class="text-xs text-gray-500">Join one of our monthly events to share and learn knowledge</p>
                            </div>
                        </a>
                        
                        <a href="{{ route('community.spotlight') }}" class="flex items-start gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors group">
                            <div class="flex-shrink-0 w-10 h-10 bg-pink-100 rounded-lg flex items-center justify-center group-hover:bg-pink-200 transition-colors">
                                <svg class="h-5 w-5 text-pink-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-sm font-semibold text-gray-900 mb-0.5">Spotlight</h3>
                                <p class="text-xs text-gray-500">Big round of applause for our amazing colleagues!</p>
                            </div>
                        </a>
                    </div>
                </div>
                
                <!-- Connect Dropdown -->
                <div class="relative" @mouseenter="closeAll(); connectOpen = true" @mouseleave="connectOpen = false">
                    <button class="flex items-center gap-1 px-4 py-2 text-sm font-medium text-gray-700 hover:text-indigo-600 rounded-lg hover:bg-gray-50 transition-colors">
                        Connect
                        <svg class="h-4 w-4 transition-transform" :class="{ 'rotate-180': connectOpen }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    
                    <!-- Connect Dropdown Menu -->
                    <div x-show="connectOpen"
                         x-cloak
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         class="absolute left-0 top-full mt-2 w-80 bg-white rounded-xl shadow-2xl border border-gray-200 p-4">
                        
                        <a href="{{ route('students.index') }}" class="flex items-start gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors group">
                            <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center group-hover:bg-blue-200 transition-colors">
                                <svg class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-sm font-semibold text-gray-900 mb-0.5">Student Directory</h3>
                                <p class="text-xs text-gray-500">Looking for other students to connect with?</p>
                            </div>
                        </a>
                        
                        <a href="{{ route('community.showcase') }}" class="flex items-start gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors group">
                            <div class="flex-shrink-0 w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center group-hover:bg-green-200 transition-colors">
                                <svg class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-sm font-semibold text-gray-900 mb-0.5">Showcase</h3>
                                <p class="text-xs text-gray-500">Showcase your marketing project results</p>
                            </div>
                        </a>
                    </div>
                </div>
                
                <!-- Ask Your Teacher -->
                <a href="{{ route('academy.ask-teacher') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-indigo-600 rounded-lg hover:bg-gray-50 transition-colors">
                    Ask Your Teacher
                </a>
            </nav>
            
            <!-- Right Actions -->
            <div class="flex items-center gap-2">
                <!-- Search Button -->
                <button @click="searchOpen = true" 
                        class="p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
                
                <!-- Login Button -->
                <a href="{{ route('login') }}" class="hidden sm:inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg transition-colors">
                    Log in
                </a>
            </div>
        </div>
    </div>
</header>
