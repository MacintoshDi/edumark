<x-layouts.app title="Discussion">
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        {{-- Hero Section --}}
        <section class="mb-8">
            <div class="flex items-start justify-between">
                <div class="flex items-start gap-4">
                    <div class="w-14 h-14 bg-indigo-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-7 h-7 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 mb-1">Discussion</h1>
                        <p class="text-sm text-gray-600">
                            Have questions, feedback requests, or want to share<br>
                            marketing resources?
                        </p>
                    </div>
                </div>
                
                {{-- Illustration --}}
                <div class="hidden lg:block">
                    <svg class="w-28 h-28" viewBox="0 0 120 120" fill="none">
                        <rect x="35" y="25" width="50" height="60" rx="6" fill="#E0E7FF"/>
                        <rect x="40" y="35" width="40" height="3" rx="1.5" fill="#818CF8"/>
                        <rect x="40" y="43" width="35" height="3" rx="1.5" fill="#A5B4FC"/>
                        <rect x="40" y="51" width="30" height="3" rx="1.5" fill="#A5B4FC"/>
                        <circle cx="75" cy="85" r="18" fill="#818CF8"/>
                        <ellipse cx="75" cy="105" rx="20" ry="12" fill="#6366F1"/>
                    </svg>
                </div>
            </div>
        </section>

        <div class="grid lg:grid-cols-3 gap-6">
            
            {{-- Main Content --}}
            <div class="lg:col-span-2 space-y-6">
                
                {{-- Featured Discussions --}}
                <section>
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Featured discussions</h2>

                    {{-- Featured Illustration --}}
                    <div class="bg-gradient-to-br from-indigo-100 to-purple-100 rounded-xl p-8 mb-5 relative overflow-hidden" style="height: 180px;">
                        <svg class="w-full h-full" viewBox="0 0 400 140" fill="none">
                            {{-- Central document with question mark --}}
                            <rect x="160" y="30" width="80" height="90" rx="6" fill="white" stroke="#818CF8" stroke-width="2"/>
                            <rect x="170" y="45" width="60" height="4" rx="2" fill="#C7D2FE"/>
                            <rect x="170" y="55" width="50" height="4" rx="2" fill="#C7D2FE"/>
                            <rect x="170" y="65" width="55" height="4" rx="2" fill="#C7D2FE"/>
                            <text x="200" y="100" text-anchor="middle" font-size="32" font-weight="bold" fill="#818CF8">?</text>
                            
                            {{-- Top avatars --}}
                            <circle cx="100" cy="40" r="16" fill="#818CF8"/>
                            <circle cx="90" cy="25" r="10" fill="white"/>
                            <path d="M88 24 L92 26 L89 28 Z" fill="#818CF8"/>
                            
                            <circle cx="300" cy="40" r="16" fill="#818CF8"/>
                            <circle cx="310" cy="25" r="10" fill="white"/>
                            <path d="M308 24 L312 26 L309 28 Z" fill="#818CF8"/>
                            
                            {{-- Bottom avatars --}}
                            <circle cx="100" cy="100" r="16" fill="#818CF8"/>
                            <circle cx="85" cy="105" r="10" fill="white"/>
                            <path d="M83 104 L87 106 L84 108 Z" fill="#818CF8"/>
                            
                            <circle cx="300" cy="100" r="16" fill="#818CF8"/>
                            <circle cx="315" cy="105" r="10" fill="white"/>
                            <path d="M313 104 L317 106 L314 108 Z" fill="#818CF8"/>
                            
                            {{-- Side avatars --}}
                            <circle cx="60" cy="70" r="16" fill="#818CF8"/>
                            <circle cx="340" cy="70" r="16" fill="#818CF8"/>
                        </svg>
                    </div>

                    {{-- Discussion 1: John Carper --}}
                    <article class="bg-white rounded-xl border border-gray-200 p-5 mb-4 hover:shadow-md transition-shadow">
                        <div class="flex items-start gap-3 mb-3">
                            <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-xs font-bold text-indigo-600">JC</span>
                            </div>
                            <div>
                                <div class="flex items-center gap-2">
                                    <h3 class="font-bold text-gray-900 text-sm">John Carper</h3>
                                    <svg class="w-4 h-4 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <p class="text-xs text-gray-500">Product Marketing Specialist</p>
                            </div>
                        </div>

                        <h4 class="text-base font-bold text-gray-900 mb-2">What's the future of influencer marketing?</h4>
                        
                        <p class="text-sm text-gray-600 mb-3">
                            I've been exploring how influencer marketing is evolving, and I'm curious about what's next. What trends do you see shaping the industry? Are micro-influencers still relevant, or is it all about mega-influencers now? I'd love to hear your thoughts on where you think influencer marketing is headed and what strategies are working best right now.
                        </p>

                        <div class="flex items-center gap-3">
                            <button class="px-3 py-1.5 border border-gray-300 rounded-md text-xs font-medium text-gray-700 hover:bg-gray-50 flex items-center gap-1">
                                <span>👍</span> Upvote
                            </button>
                            <button class="px-3 py-1.5 border border-gray-300 rounded-md text-xs font-medium text-gray-700 hover:bg-gray-50 flex items-center gap-1">
                                <span>💬</span> Reply
                            </button>
                            <button class="px-3 py-1.5 border border-gray-300 rounded-md text-xs font-medium text-gray-700 hover:bg-gray-50 flex items-center gap-1">
                                <span>🔗</span> Share
                            </button>
                        </div>
                    </article>

                    {{-- Discussion 2: Edumark Team --}}
                    <article class="bg-white rounded-xl border border-gray-200 p-5 hover:shadow-md transition-shadow">
                        <div class="flex items-start gap-3 mb-3">
                            <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-xs font-bold text-purple-600">ET</span>
                            </div>
                            <div>
                                <div class="flex items-center gap-2">
                                    <h3 class="font-bold text-gray-900 text-sm">Edumark Team</h3>
                                    <svg class="w-4 h-4 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <p class="text-xs text-gray-500">Platform Administrator</p>
                            </div>
                        </div>

                        <h4 class="text-base font-bold text-gray-900 mb-2">Book club for marketing enthusiasts</h4>
                        
                        <p class="text-sm text-gray-600 mb-3">
                            Hello, fellow marketers! I wanted to start a book club where we can discuss marketing books, share takeaways and learn from each other. Join us on the marketing principles that really make a difference. Let me know which books you'd like to read and when you would be available for discussions!
                        </p>

                        <div class="flex items-center gap-3">
                            <button class="px-3 py-1.5 border border-gray-300 rounded-md text-xs font-medium text-gray-700 hover:bg-gray-50 flex items-center gap-1">
                                <span>👍</span> Upvote
                            </button>
                            <button class="px-3 py-1.5 border border-gray-300 rounded-md text-xs font-medium text-gray-700 hover:bg-gray-50 flex items-center gap-1">
                                <span>💬</span> Reply
                            </button>
                            <button class="px-3 py-1.5 border border-gray-300 rounded-md text-xs font-medium text-gray-700 hover:bg-gray-50 flex items-center gap-1">
                                <span>🔗</span> Share
                            </button>
                        </div>
                    </article>
                </section>

                {{-- Popular Discussions --}}
                <section class="mt-8">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Popular discussions</h2>
                    
                    <div class="grid md:grid-cols-2 gap-4">
                        <article class="bg-white rounded-xl border border-gray-200 p-4 hover:shadow-md transition-shadow">
                            <span class="px-2 py-1 bg-indigo-100 text-indigo-700 rounded text-xs font-medium">Questions</span>
                            <h4 class="text-sm font-bold text-gray-900 mt-3 mb-3">Website usability feedback requested</h4>
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center text-xs font-bold text-blue-600">MJ</div>
                                <span class="text-xs text-gray-600">Mike Johnson</span>
                            </div>
                        </article>

                        <article class="bg-white rounded-xl border border-gray-200 p-4 hover:shadow-md transition-shadow">
                            <span class="px-2 py-1 bg-purple-100 text-purple-700 rounded text-xs font-medium">Help</span>
                            <h4 class="text-sm font-bold text-gray-900 mt-3 mb-3">Feedback on my content marketing strategy?</h4>
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center text-xs font-bold text-green-600">AT</div>
                                <span class="text-xs text-gray-600">Alex Thompson</span>
                            </div>
                        </article>

                        <article class="bg-white rounded-xl border border-gray-200 p-4 hover:shadow-md transition-shadow">
                            <span class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs font-medium">Questions</span>
                            <h4 class="text-sm font-bold text-gray-900 mt-3 mb-3">In-depth guide: Mastering Google Ads</h4>
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 bg-yellow-100 rounded-full flex items-center justify-center text-xs font-bold text-yellow-600">SJ</div>
                                <span class="text-xs text-gray-600">Sarah Johnson</span>
                            </div>
                        </article>

                        <article class="bg-white rounded-xl border border-gray-200 p-4 hover:shadow-md transition-shadow">
                            <span class="px-2 py-1 bg-orange-100 text-orange-700 rounded text-xs font-medium">Questions</span>
                            <h4 class="text-sm font-bold text-gray-900 mt-3 mb-3">Best SEO tools for beginners?</h4>
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 bg-pink-100 rounded-full flex items-center justify-center text-xs font-bold text-pink-600">SB</div>
                                <span class="text-xs text-gray-600">Sarah Brown</span>
                            </div>
                        </article>
                    </div>
                </section>

            </div>

            {{-- Sidebar - ОТДЕЛЬНЫЕ КАРТОЧКИ --}}
            <aside class="lg:col-span-1">
                <div class="space-y-4">
                    
                    {{-- Recent Discussions Header --}}
                    <h3 class="text-lg font-bold text-gray-900">Recent discussions</h3>
                    
                    {{-- Отдельные карточки --}}
                    <article class="bg-white rounded-xl border border-gray-200 p-4 hover:shadow-md transition-shadow cursor-pointer">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="px-2 py-1 bg-purple-100 text-purple-700 rounded text-xs font-medium">Feedback</span>
                            <span class="text-xs text-gray-400 flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                08/20/2024
                            </span>
                        </div>
                        <h4 class="text-sm font-bold text-gray-900">Website usability feedback requested!</h4>
                    </article>

                    <article class="bg-white rounded-xl border border-gray-200 p-4 hover:shadow-md transition-shadow cursor-pointer">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="px-2 py-1 bg-purple-100 text-purple-700 rounded text-xs font-medium">Feedback</span>
                            <span class="text-xs text-gray-400 flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                08/20/2024
                            </span>
                        </div>
                        <h4 class="text-sm font-bold text-gray-900">Feedback on my content marketing strategy?</h4>
                    </article>

                    <article class="bg-white rounded-xl border border-gray-200 p-4 hover:shadow-md transition-shadow cursor-pointer">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="px-2 py-1 bg-indigo-100 text-indigo-700 rounded text-xs font-medium">Resources</span>
                            <span class="text-xs text-gray-400 flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                08/20/2024
                            </span>
                        </div>
                        <h4 class="text-sm font-bold text-gray-900">In-depth guide: Mastering Google Analytics</h4>
                    </article>

                    <article class="bg-white rounded-xl border border-gray-200 p-4 hover:shadow-md transition-shadow cursor-pointer">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="px-2 py-1 bg-indigo-100 text-indigo-700 rounded text-xs font-medium">Questions</span>
                            <span class="text-xs text-gray-400 flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                08/20/2024
                            </span>
                        </div>
                        <h4 class="text-sm font-bold text-gray-900">Best SEO tools for beginners?</h4>
                    </article>

                    {{-- Connect CTA --}}
                    <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl p-5 text-center relative overflow-hidden mt-6">
                        <div class="absolute right-2 bottom-2 opacity-15">
                            <svg class="w-20 h-20" viewBox="0 0 100 100" fill="none">
                                <circle cx="30" cy="30" r="12" fill="#818CF8"/>
                                <circle cx="70" cy="30" r="12" fill="#818CF8"/>
                                <circle cx="50" cy="60" r="12" fill="#6366F1"/>
                                <line x1="35" y1="38" x2="47" y2="53" stroke="#818CF8" stroke-width="2.5"/>
                                <line x1="65" y1="38" x2="53" y2="53" stroke="#818CF8" stroke-width="2.5"/>
                            </svg>
                        </div>
                        
                        <div class="relative z-10">
                            <h3 class="text-base font-bold text-gray-900 mb-2">Looking to connect with other students?</h3>
                            <p class="text-xs text-gray-600 mb-3">
                                Want to chat with fellow students directly? Join the Connect page!
                            </p>
                            <a href="#" class="inline-flex items-center gap-1 px-4 py-2 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700 transition-colors text-sm">
                                Go to Connect
                            </a>
                        </div>
                    </div>

                </div>
            </aside>

        </div>

    </main>
</x-layouts.app>
