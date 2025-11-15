<x-layouts.app title="Cohorts">
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        {{-- Page Header --}}
        <section class="bg-white rounded-2xl p-8 lg:p-12 mb-8">
            <div class="grid lg:grid-cols-2 gap-8 items-center">
                <div>
                    <div class="text-6xl mb-4">📚</div>
                    <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Cohorts</h1>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Welcome to the community-led cohorts at Edumark. Select your cohort below.
                    </p>
                </div>
                <div class="relative flex justify-center lg:justify-end">
                    {{-- Decorative shapes --}}
                    <div class="absolute w-32 h-32 bg-purple-200 rounded-full opacity-30 blur-2xl top-0 left-0"></div>
                    <div class="absolute w-40 h-40 bg-blue-200 rounded-full opacity-30 blur-2xl bottom-0 right-0"></div>
                    
                    {{-- Notebook Illustration --}}
                    <div class="relative z-10">
                        <img src="https://i.imgur.com/7TQ8z2P.png" alt="Cohorts" class="w-64 h-auto">
                    </div>
                    
                    {{-- Bettermode Badge --}}
                    <div class="absolute bottom-0 right-0 bg-green-500 text-white px-3 py-1.5 rounded-full text-sm font-medium flex items-center gap-1 shadow-lg">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        Made in Bettermode
                    </div>
                </div>
            </div>
        </section>

        {{-- Cohorts Grid --}}
        <section class="grid md:grid-cols-2 gap-6">
            
            {{-- Cohort 1: Growth Marketing --}}
            <article class="bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-xl transition-all">
                {{-- Illustration --}}
                <div class="relative h-64 bg-gradient-to-br from-indigo-400 to-purple-500 p-8 flex items-center justify-center">
                    <img src="https://i.imgur.com/eBiep4u.png" alt="Growth Marketing" class="w-48 h-48 object-contain">
                    <div class="absolute top-4 right-4 text-white text-7xl font-bold opacity-30">1</div>
                </div>

                {{-- Content --}}
                <div class="p-6">
                    <div class="flex items-center gap-4 text-sm text-gray-500 mb-3">
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                            </svg>
                            3 members
                        </span>
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                            </svg>
                            10 posts
                        </span>
                    </div>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Cohort 1: Growth Marketing</h3>

                    <p class="text-gray-600 leading-relaxed mb-5">
                        Elevate your skills with cutting-edge strategies for unparalleled growth success. Join us now!
                    </p>

                    <button class="w-full px-4 py-3 border-2 border-gray-300 hover:border-indigo-500 hover:bg-indigo-50 rounded-xl font-medium transition-colors">
                        Join
                    </button>
                </div>
            </article>

            {{-- Cohort 2: Advanced SEO --}}
            <article class="bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-xl transition-all">
                <div class="relative h-64 bg-gradient-to-br from-indigo-400 to-purple-500 p-8 flex items-center justify-center">
                    <img src="https://i.imgur.com/i9PQL9r.png" alt="Advanced SEO" class="w-48 h-48 object-contain">
                    <div class="absolute top-4 right-4 text-white text-7xl font-bold opacity-30">2</div>
                </div>

                <div class="p-6">
                    <div class="flex items-center gap-4 text-sm text-gray-500 mb-3">
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                            </svg>
                            3 members
                        </span>
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                            </svg>
                            5 posts
                        </span>
                    </div>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Cohort 2: Advanced SEO</h3>

                    <p class="text-gray-600 leading-relaxed mb-5">
                        Master the art of SEO with expert techniques for top rankings. Enroll today and lead the search!
                    </p>

                    <button class="w-full px-4 py-3 border-2 border-gray-300 hover:border-indigo-500 hover:bg-indigo-50 rounded-xl font-medium transition-colors">
                        Join
                    </button>
                </div>
            </article>

            {{-- Cohort 3: Video Marketing --}}
            <article class="bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-xl transition-all">
                <div class="relative h-64 bg-gradient-to-br from-indigo-400 to-purple-500 p-8 flex items-center justify-center">
                    <img src="https://i.imgur.com/b2wSgP9.png" alt="Video Marketing" class="w-48 h-48 object-contain">
                    <div class="absolute top-4 right-4 text-white text-7xl font-bold opacity-30">3</div>
                </div>

                <div class="p-6">
                    <div class="flex items-center gap-4 text-sm text-gray-500 mb-3">
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                            </svg>
                            3 members
                        </span>
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                            </svg>
                            5 posts
                        </span>
                    </div>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Cohort 3: Video Marketing</h3>

                    <p class="text-gray-600 leading-relaxed mb-5">
                        Harness the power of video to engage, inspire, and convert. Join us to revolutionize your marketing!
                    </p>

                    <button class="w-full px-4 py-3 border-2 border-gray-300 hover:border-indigo-500 hover:bg-indigo-50 rounded-xl font-medium transition-colors">
                        Join
                    </button>
                </div>
            </article>

            {{-- Cohort 4: Content Marketing --}}
            <article class="bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-xl transition-all">
                <div class="relative h-64 bg-gradient-to-br from-indigo-400 to-purple-500 p-8 flex items-center justify-center">
                    <img src="https://i.imgur.com/D4s2Q1h.png" alt="Content Marketing" class="w-48 h-48 object-contain">
                    <div class="absolute top-4 right-4 text-white text-7xl font-bold opacity-30">4</div>
                </div>

                <div class="p-6">
                    <div class="flex items-center gap-4 text-sm text-gray-500 mb-3">
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                            </svg>
                            3 members
                        </span>
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                            </svg>
                            5 posts
                        </span>
                    </div>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Cohort 4: Content Marketing</h3>

                    <p class="text-gray-600 leading-relaxed mb-5">
                        Create compelling content that captivates audiences and drives results. Join us to elevate your strategy!
                    </p>

                    <button class="w-full px-4 py-3 border-2 border-gray-300 hover:border-indigo-500 hover:bg-indigo-50 rounded-xl font-medium transition-colors">
                        Join
                    </button>
                </div>
            </article>

        </section>
    </main>
</x-layouts.app>
