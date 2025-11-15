<x-layouts.app title="Welcome to Edumark">
    <!-- Welcome Section -->
    <div class="bg-white rounded-2xl shadow-sm overflow-hidden mb-8">
        <div class="grid lg:grid-cols-2 gap-8 items-center p-8 lg:p-12">
            <div class="space-y-4">
                <div class="text-6xl">👋</div>
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900">Welcome</h1>
                <p class="text-lg text-gray-600 leading-relaxed">
                    Welcome to Edumark — We're glad you enrolled in one of our cohorts, and we want to give you a warm greeting to our community!
                </p>
            </div>
            <div class="flex justify-center">
                <img src="{{ asset('assets/images/welcome-laptop.png') }}" alt="Edumark Laptop" class="w-full max-w-md">
            </div>
        </div>
    </div>

    <!-- Info Section -->
    <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl shadow-sm overflow-hidden mb-12">
        <div class="grid lg:grid-cols-2 gap-8 items-center p-8 lg:p-12">
            <div class="flex justify-center order-2 lg:order-1">
                <img src="{{ asset('assets/images/info-diagram.png') }}" alt="Edumark Diagram" class="w-full max-w-sm">
            </div>
            <div class="space-y-4 order-1 lg:order-2">
                <h2 class="text-3xl font-bold text-gray-900">What can you find here?</h2>
                <p class="text-lg text-gray-600 leading-relaxed">
                    In here, you will be able to find everything, from discussions, to resources, and even your cohort assignments so you can have everything in one place.
                </p>
            </div>
        </div>
    </div>

    <!-- How to Get Started Section -->
    <div class="mb-8">
        <div class="flex items-end justify-between mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">How to get started?</h2>
                <p class="text-gray-600">Please click your cohort number below, and you will be redirected to the page with all the resources you will need!</p>
            </div>
            <a href="{{ route('cohorts.index') }}" class="hidden sm:inline-flex items-center px-4 py-2 text-sm font-medium text-indigo-600 hover:text-indigo-700 hover:bg-indigo-50 rounded-lg transition-colors">
                Browse all →
            </a>
        </div>

        <!-- Cohorts Grid -->
        <div class="grid md:grid-cols-2 gap-6">
            {{-- Cohort 1 --}}
            <article class="bg-white rounded-xl border-2 border-indigo-200 hover:border-indigo-400 hover:shadow-xl transition-all p-6 group cursor-pointer">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-indigo-600 text-white rounded-lg flex items-center justify-center text-2xl font-bold">1</div>
                        <div class="flex items-center gap-2 text-sm text-gray-600">
                            <span class="flex items-center gap-1">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                3 members
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                                10 posts
                            </span>
                        </div>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition-colors">Cohort 1: Growth Marketing</h3>
                <p class="text-gray-600 mb-4">Elevate your skills with cutting-edge strategies for unparalleled growth success. Join us now!</p>
                <a href="{{ route('cohorts.show', 'growth-marketing') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg transition-colors">
                    View Cohort
                </a>
            </article>

            {{-- Cohort 2 --}}
            <article class="bg-white rounded-xl border-2 border-purple-200 hover:border-purple-400 hover:shadow-xl transition-all p-6 group cursor-pointer">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-purple-600 text-white rounded-lg flex items-center justify-center text-2xl font-bold">2</div>
                        <div class="flex items-center gap-2 text-sm text-gray-600">
                            <span class="flex items-center gap-1">👥 3 members</span>
                            <span class="flex items-center gap-1">💬 5 posts</span>
                        </div>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-purple-600 transition-colors">Cohort 2: Advanced SEO</h3>
                <p class="text-gray-600 mb-4">Master the art of SEO with expert techniques for top rankings. Enroll today and lead the search!</p>
                <a href="{{ route('cohorts.show', 'advanced-seo') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 rounded-lg transition-colors">
                    View Cohort
                </a>
            </article>

            {{-- Cohort 3 --}}
            <article class="bg-white rounded-xl border-2 border-pink-200 hover:border-pink-400 hover:shadow-xl transition-all p-6 group cursor-pointer">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-pink-600 text-white rounded-lg flex items-center justify-center text-2xl font-bold">3</div>
                        <div class="flex items-center gap-2 text-sm text-gray-600">
                            <span>👥 3 members</span>
                            <span>💬 5 posts</span>
                        </div>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-pink-600">Cohort 3: Video Marketing</h3>
                <p class="text-gray-600 mb-4">Harness the power of video to engage, inspire, and convert. Join us to revolutionize your marketing!</p>
                <a href="{{ route('cohorts.show', 'video-marketing') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-pink-600 hover:bg-pink-700 rounded-lg">
                    View Cohort
                </a>
            </article>

            {{-- Cohort 4 --}}
            <article class="bg-white rounded-xl border-2 border-green-200 hover:border-green-400 hover:shadow-xl transition-all p-6 group cursor-pointer">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-green-600 text-white rounded-lg flex items-center justify-center text-2xl font-bold">4</div>
                        <div class="flex items-center gap-2 text-sm text-gray-600">
                            <span>👥 3 members</span>
                            <span>💬 5 posts</span>
                        </div>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-green-600">Cohort 4: Content Marketing</h3>
                <p class="text-gray-600 mb-4">Create compelling content that captivates audiences and drives results. Join us to elevate your strategy!</p>
                <a href="{{ route('cohorts.show', 'content-marketing') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-600 hover:bg-green-700 rounded-lg">
                    View Cohort
                </a>
            </article>
        </div>
    </div>
</x-layouts.app>
