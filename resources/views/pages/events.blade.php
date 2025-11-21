<x-layouts.app title="Events">
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        {{-- Hero Section --}}
        <section class="mb-12">
            <div class="flex items-start gap-4 mb-8">
                <div class="w-16 h-16 bg-indigo-100 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-8 h-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-4xl font-bold text-gray-900 mb-3">Events</h1>
                    <p class="text-lg text-gray-600">
                        Join our upcoming webinars, workshops, and networking events to enhance your marketing skills.
                    </p>
                </div>
            </div>
        </section>

        {{-- Featured Events --}}
        <section class="mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Featured events</h2>
            
            <div class="grid md:grid-cols-2 gap-6">
                {{-- Event 1: Marketing Metrics Workshop --}}
                <article class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="h-48 bg-gradient-to-br from-indigo-100 to-purple-100 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <svg class="w-24 h-24 text-indigo-400 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full text-xs font-medium">Marketing</span>
                            <span class="text-sm text-gray-500">📅 Dec 15, 2024</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Marketing Metrics Workshop</h3>
                        <p class="text-gray-600 mb-4">
                            Learn how to measure and analyze your marketing campaigns with key performance indicators and data-driven strategies.
                        </p>
                        <button class="w-full px-6 py-3 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700 transition-colors">
                            Register now
                        </button>
                    </div>
                </article>

                {{-- Event 2: SEO Secrets Workshop --}}
                <article class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="h-48 bg-gradient-to-br from-purple-100 to-pink-100 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <svg class="w-24 h-24 text-purple-400 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-medium">SEO</span>
                            <span class="text-sm text-gray-500">📅 Dec 20, 2024</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">SEO Secrets Unveiled Workshop</h3>
                        <p class="text-gray-600 mb-4">
                            Discover advanced SEO techniques and best practices to boost your website's visibility in search engines.
                        </p>
                        <button class="w-full px-6 py-3 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700 transition-colors">
                            Register now
                        </button>
                    </div>
                </article>
            </div>
        </section>

        {{-- All Events --}}
        <section class="mb-12" x-data="{ activeFilter: 'all' }">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">All events</h2>
            
            {{-- Filters --}}
            <div class="flex gap-2 mb-8">
                <button @click="activeFilter = 'all'" 
                        :class="activeFilter === 'all' ? 'bg-indigo-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-50'"
                        class="px-6 py-2.5 rounded-full font-medium text-sm transition-colors border-2 border-transparent">
                    All
                </button>
                <button @click="activeFilter = 'upcoming'" 
                        :class="activeFilter === 'upcoming' ? 'border-indigo-600 text-indigo-600' : 'border-gray-300 text-gray-700 hover:bg-gray-50'"
                        class="px-6 py-2.5 bg-white rounded-full font-medium text-sm transition-colors border-2">
                    Upcoming
                </button>
                <button @click="activeFilter = 'past'" 
                        :class="activeFilter === 'past' ? 'border-indigo-600 text-indigo-600' : 'border-gray-300 text-gray-700 hover:bg-gray-50'"
                        class="px-6 py-2.5 bg-white rounded-full font-medium text-sm transition-colors border-2">
                    Past events
                </button>
            </div>

            {{-- Events Grid --}}
            <div class="grid md:grid-cols-3 gap-6">
                
                {{-- Event 1 --}}
                <article class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="h-40 bg-gradient-to-br from-blue-100 to-indigo-100 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <svg class="w-16 h-16 text-blue-400 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-medium">Marketing</span>
                            <span class="text-xs text-gray-500">📅 Dec 5</span>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-2">Marketing Metrics Workshop</h3>
                        <p class="text-sm text-gray-600 mb-4">Master KPIs and analytics for data-driven marketing success.</p>
                        <button class="w-full px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 transition-colors">
                            Register now
                        </button>
                    </div>
                </article>

                {{-- Event 2 --}}
                <article class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="h-40 bg-gradient-to-br from-purple-100 to-pink-100 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <svg class="w-16 h-16 text-purple-400 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-2.5 py-1 bg-purple-100 text-purple-700 rounded-md text-xs font-medium">SEO</span>
                            <span class="text-xs text-gray-500">📅 Dec 10</span>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-2">SEO Secrets Unveiled Workshop</h3>
                        <p class="text-sm text-gray-600 mb-4">Advanced techniques to boost your website's search visibility.</p>
                        <button class="w-full px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 transition-colors">
                            Register now
                        </button>
                    </div>
                </article>

                {{-- Event 3 --}}
                <article class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="h-40 bg-gradient-to-br from-green-100 to-teal-100 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <svg class="w-16 h-16 text-green-400 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-2.5 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">Networking</span>
                            <span class="text-xs text-gray-500">📅 Dec 18</span>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-2">Content Creators Networking</h3>
                        <p class="text-sm text-gray-600 mb-4">Connect with fellow content creators and share strategies.</p>
                        <button class="w-full px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 transition-colors">
                            Register now
                        </button>
                    </div>
                </article>

                {{-- Event 4 --}}
                <article class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="h-40 bg-gradient-to-br from-yellow-100 to-orange-100 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <svg class="w-16 h-16 text-yellow-400 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-2.5 py-1 bg-yellow-100 text-yellow-700 rounded-md text-xs font-medium">Workshop</span>
                            <span class="text-xs text-gray-500">📅 Dec 22</span>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-2">Advanced Email Marketing</h3>
                        <p class="text-sm text-gray-600 mb-4">Build effective email campaigns that convert subscribers.</p>
                        <button class="w-full px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 transition-colors">
                            Register now
                        </button>
                    </div>
                </article>

                {{-- Event 5 --}}
                <article class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="h-40 bg-gradient-to-br from-red-100 to-pink-100 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <svg class="w-16 h-16 text-red-400 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-2.5 py-1 bg-red-100 text-red-700 rounded-md text-xs font-medium">Video</span>
                            <span class="text-xs text-gray-500">📅 Dec 28</span>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-2">Video Marketing Mastery</h3>
                        <p class="text-sm text-gray-600 mb-4">Create engaging video content that drives results.</p>
                        <button class="w-full px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 transition-colors">
                            Register now
                        </button>
                    </div>
                </article>

                {{-- Event 6 --}}
                <article class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="h-40 bg-gradient-to-br from-indigo-100 to-blue-100 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <svg class="w-16 h-16 text-indigo-400 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-2.5 py-1 bg-indigo-100 text-indigo-700 rounded-md text-xs font-medium">Strategy</span>
                            <span class="text-xs text-gray-500">📅 Jan 5</span>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-2">Growth Hacking Strategies</h3>
                        <p class="text-sm text-gray-600 mb-4">Rapid growth tactics for startups and scale-ups.</p>
                        <button class="w-full px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 transition-colors">
                            Register now
                        </button>
                    </div>
                </article>

            </div>
        </section>

        {{-- CTA Section --}}
        <section class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl p-12 text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Want to host a virtual or an in-person event?</h2>
            <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">
                If you want to organize an event for the community, you can start one today. Get in touch with us and we'll be happy to help you out.
            </p>
            <button class="px-8 py-4 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700 transition-colors text-lg">
                Contact us
            </button>
        </section>

    </main>
</x-layouts.app>
