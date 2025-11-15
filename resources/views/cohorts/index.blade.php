<x-layouts.app title="All Cohorts">
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <header class="mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">All Cohorts</h1>
            <p class="text-lg text-gray-600">Choose your learning path and join a community of marketers</p>
        </header>

        <div class="grid md:grid-cols-2 gap-8">
            
            {{-- Cohort 1: Growth Marketing --}}
            <article class="bg-white rounded-2xl border-2 border-gray-200 overflow-hidden hover:shadow-xl transition-all duration-300 hover:border-indigo-500">
                <div class="h-48 bg-gradient-to-br from-indigo-500 to-purple-600"></div>
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 bg-indigo-500 text-white rounded-xl flex items-center justify-center text-2xl font-bold">
                            1
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900">Growth Marketing</h2>
                            <p class="text-sm text-gray-500">3 members • 10 posts</p>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6">Elevate your skills with cutting-edge strategies for unparalleled growth success</p>
                    <a href="{{ route('cohorts.growth-marketing') }}" class="block w-full px-6 py-3 bg-indigo-600 text-white text-center rounded-lg hover:bg-indigo-700 font-medium transition-colors">
                        View Cohort
                    </a>
                </div>
            </article>

            {{-- Cohort 2: Advanced SEO --}}
            <article class="bg-white rounded-2xl border-2 border-gray-200 overflow-hidden hover:shadow-xl transition-all duration-300 hover:border-purple-500">
                <div class="h-48 bg-gradient-to-br from-purple-500 to-pink-600"></div>
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 bg-purple-500 text-white rounded-xl flex items-center justify-center text-2xl font-bold">
                            2
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900">Advanced SEO</h2>
                            <p class="text-sm text-gray-500">3 members • 5 posts</p>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6">Master the art of SEO with expert techniques for top rankings</p>
                    <a href="{{ route('cohorts.advanced-seo') }}" class="block w-full px-6 py-3 bg-purple-600 text-white text-center rounded-lg hover:bg-purple-700 font-medium transition-colors">
                        View Cohort
                    </a>
                </div>
            </article>

            {{-- Cohort 3: Video Marketing --}}
            <article class="bg-white rounded-2xl border-2 border-gray-200 overflow-hidden hover:shadow-xl transition-all duration-300 hover:border-pink-500">
                <div class="h-48 bg-gradient-to-br from-pink-500 to-rose-600"></div>
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 bg-pink-500 text-white rounded-xl flex items-center justify-center text-2xl font-bold">
                            3
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900">Video Marketing</h2>
                            <p class="text-sm text-gray-500">3 members • 5 posts</p>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6">Harness the power of video to engage, inspire, and convert</p>
                    <a href="{{ route('cohorts.video-marketing') }}" class="block w-full px-6 py-3 bg-pink-600 text-white text-center rounded-lg hover:bg-pink-700 font-medium transition-colors">
                        View Cohort
                    </a>
                </div>
            </article>

            {{-- Cohort 4: Content Marketing --}}
            <article class="bg-white rounded-2xl border-2 border-gray-200 overflow-hidden hover:shadow-xl transition-all duration-300 hover:border-orange-500">
                <div class="h-48 bg-gradient-to-br from-orange-500 to-red-600"></div>
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 bg-orange-500 text-white rounded-xl flex items-center justify-center text-2xl font-bold">
                            4
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900">Content Marketing</h2>
                            <p class="text-sm text-gray-500">3 members • 5 posts</p>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6">Create compelling content that captivates audiences and drives results</p>
                    <a href="{{ route('cohorts.content-marketing') }}" class="block w-full px-6 py-3 bg-orange-600 text-white text-center rounded-lg hover:bg-orange-700 font-medium transition-colors">
                        View Cohort
                    </a>
                </div>
            </article>

        </div>

    </main>
</x-layouts.app>
