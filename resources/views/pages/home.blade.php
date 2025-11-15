<x-layouts.app title="Welcome">
    {{-- Welcome Hero Section --}}
    <div class="bg-white rounded-2xl shadow-sm p-8 lg:p-12 mb-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <div class="text-6xl mb-4">👋</div>
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Welcome</h1>
                <p class="text-lg text-gray-600 leading-relaxed">
                    Welcome to Edumark — We're glad you enrolled in one of our cohorts, and we want to give you a warm greeting to our community!
                </p>
            </div>
            <div class="flex justify-center">
                <div class="relative">
                    <div class="absolute -top-10 -left-10 w-64 h-64 bg-purple-200 rounded-full opacity-20 blur-3xl"></div>
                    <div class="absolute -bottom-10 -right-10 w-64 h-64 bg-blue-200 rounded-full opacity-20 blur-3xl"></div>
                    <div class="relative bg-white border-4 border-gray-900 rounded-2xl p-8 shadow-2xl" style="transform: perspective(1000px) rotateY(-5deg);">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="flex gap-1.5">
                                <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                            </div>
                        </div>
                        <div class="text-center py-12">
                            <svg class="w-16 h-16 mx-auto mb-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <h3 class="text-2xl font-bold">edumark</h3>
                        </div>
                        <div class="absolute -bottom-4 -right-4 bg-green-500 text-white px-3 py-1.5 rounded-full text-sm font-medium flex items-center gap-1 shadow-lg">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Made in Bettermode
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- What can you find here Section --}}
    <div class="bg-gradient-to-br from-blue-50 to-purple-50 rounded-2xl shadow-sm p-8 lg:p-12 mb-12">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="order-2 lg:order-1">
                {{-- Diagram --}}
                <div class="relative">
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                        <div class="bg-white border-2 border-gray-900 rounded-xl px-6 py-3 font-bold text-lg flex items-center gap-2 shadow-lg">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" stroke-width="2"/>
                            </svg>
                            edumark
                        </div>
                    </div>
                    
                    {{-- Connected icons --}}
                    <div class="grid grid-cols-3 gap-8">
                        {{-- Top row --}}
                        <div class="col-start-2 flex justify-center">
                            <div class="bg-white border-2 border-gray-300 rounded-xl p-4 shadow-md">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                        </div>
                        
                        {{-- Middle row --}}
                        <div class="flex justify-center items-center">
                            <div class="bg-white border-2 border-gray-300 rounded-xl p-4 shadow-md">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
                                </svg>
                            </div>
                        </div>
                        <div></div>
                        <div class="flex justify-center items-center">
                            <div class="bg-white border-2 border-gray-300 rounded-xl p-4 shadow-md">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                        </div>
                        
                        {{-- Bottom row --}}
                        <div class="flex justify-center">
                            <div class="bg-white border-2 border-gray-300 rounded-xl p-4 shadow-md">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                        </div>
                        <div></div>
                        <div class="flex justify-center">
                            <div class="bg-white border-2 border-gray-300 rounded-xl p-4 shadow-md">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order-1 lg:order-2">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">What can you find here?</h2>
                <p class="text-lg text-gray-600 leading-relaxed">
                    In here, you will be able to find everything, from discussions, to resources, and even your cohort assignments so you can have everything in one place.
                </p>
            </div>
        </div>
    </div>

    {{-- How to get started Section --}}
    <div class="mb-8">
        <div class="flex items-end justify-between mb-6">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">How to get started?</h2>
                <p class="text-gray-600">Please click your cohort number below, and you will be redirected to the page with all the resources you will need!</p>
            </div>
            <a href="{{ route('cohorts.index') }}" class="text-indigo-600 hover:text-indigo-700 font-medium">
                Browse all →
            </a>
        </div>

        {{-- Cohorts Grid --}}
        <div class="grid md:grid-cols-2 gap-6">
            {{-- Cohort 1 --}}
            <article class="bg-white rounded-2xl border border-gray-200 hover:shadow-xl transition-all p-6">
                <div class="flex items-start gap-4 mb-4">
                    <div class="w-16 h-16 bg-indigo-500 text-white rounded-xl flex items-center justify-center text-2xl font-bold flex-shrink-0">
                        1
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-4 text-sm text-gray-500 mb-2">
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
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Cohort 1: Growth Marketing</h3>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    Elevate your skills with cutting-edge strategies for unparalleled growth success. Join us now!
                </p>
                <button class="w-full px-4 py-2.5 border-2 border-gray-200 hover:border-indigo-500 hover:text-indigo-600 rounded-xl font-medium transition-colors">
                    Join
                </button>
            </article>

            {{-- Cohort 2 --}}
            <article class="bg-white rounded-2xl border border-gray-200 hover:shadow-xl transition-all p-6">
                <div class="flex items-start gap-4 mb-4">
                    <div class="w-16 h-16 bg-indigo-500 text-white rounded-xl flex items-center justify-center text-2xl font-bold flex-shrink-0">
                        2
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-4 text-sm text-gray-500 mb-2">
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
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Cohort 2: Advanced SEO</h3>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    Master the art of SEO with expert techniques for top rankings. Enroll today and lead the search!
                </p>
                <button class="w-full px-4 py-2.5 border-2 border-gray-200 hover:border-indigo-500 hover:text-indigo-600 rounded-xl font-medium transition-colors">
                    Join
                </button>
            </article>

            {{-- Cohort 3 --}}
            <article class="bg-white rounded-2xl border border-gray-200 hover:shadow-xl transition-all p-6">
                <div class="flex items-start gap-4 mb-4">
                    <div class="w-16 h-16 bg-indigo-500 text-white rounded-xl flex items-center justify-center text-2xl font-bold flex-shrink-0">
                        3
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-4 text-sm text-gray-500 mb-2">
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
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Cohort 3: Video Marketing</h3>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    Harness the power of video to engage, inspire, and convert. Join us to revolutionize your marketing!
                </p>
                <button class="w-full px-4 py-2.5 border-2 border-gray-200 hover:border-indigo-500 hover:text-indigo-600 rounded-xl font-medium transition-colors">
                    Join
                </button>
            </article>

            {{-- Cohort 4 --}}
            <article class="bg-white rounded-2xl border border-gray-200 hover:shadow-xl transition-all p-6">
                <div class="flex items-start gap-4 mb-4">
                    <div class="w-16 h-16 bg-indigo-500 text-white rounded-xl flex items-center justify-center text-2xl font-bold flex-shrink-0">
                        4
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-4 text-sm text-gray-500 mb-2">
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
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Cohort 4: Content Marketing</h3>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    Create compelling content that captivates audiences and drives results. Join us to elevate your strategy!
                </p>
                <button class="w-full px-4 py-2.5 border-2 border-gray-200 hover:border-indigo-500 hover:text-indigo-600 rounded-xl font-medium transition-colors">
                    Join
                </button>
            </article>
        </div>
    </div>
</x-layouts.app>
