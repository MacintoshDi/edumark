<x-layouts.app title="All Cohorts">
    <div class="mb-8">
        <div class="flex items-center gap-4 mb-6">
            <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center">
                <svg class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Cohorts</h1>
                <p class="text-gray-600">Welcome to the community-led cohorts at Edumark. Select your cohort below.</p>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            {{-- Cohort 1 --}}
            <article class="bg-white rounded-xl shadow-sm hover:shadow-xl transition-all overflow-hidden group cursor-pointer border border-gray-200">
                <div class="p-6">
                    <div class="flex items-start gap-4 mb-4">
                        <img src="{{ asset('assets/images/cohort-growth-marketing.png') }}" alt="Growth Marketing" class="w-20 h-20 rounded-xl object-cover flex-shrink-0">
                        <div class="flex-1">
                            <span class="inline-block px-3 py-1 bg-indigo-100 text-indigo-800 text-xs font-semibold rounded-full mb-2">Cohort 1</span>
                            <h3 class="text-xl font-bold text-gray-900 group-hover:text-indigo-600">Growth Marketing</h3>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">Elevate your skills with cutting-edge strategies for unparalleled growth success.</p>
                    <div class="flex items-center gap-4 text-sm text-gray-500 mb-4">
                        <span>👥 3 members</span>
                        <span>💬 10 posts</span>
                    </div>
                    <a href="{{ route('cohorts.show', 'growth-marketing') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                        View Cohort →
                    </a>
                </div>
            </article>

            {{-- Cohort 2 --}}
            <article class="bg-white rounded-xl shadow-sm hover:shadow-xl transition-all overflow-hidden group cursor-pointer border border-gray-200">
                <div class="p-6">
                    <div class="flex items-start gap-4 mb-4">
                        <img src="{{ asset('assets/images/cohort-advanced-seo.png') }}" alt="Advanced SEO" class="w-20 h-20 rounded-xl object-cover">
                        <div class="flex-1">
                            <span class="inline-block px-3 py-1 bg-purple-100 text-purple-800 text-xs font-semibold rounded-full mb-2">Cohort 2</span>
                            <h3 class="text-xl font-bold text-gray-900 group-hover:text-purple-600">Advanced SEO</h3>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">Master the art of SEO with expert techniques for top rankings.</p>
                    <div class="flex items-center gap-4 text-sm text-gray-500 mb-4">
                        <span>👥 3 members</span>
                        <span>💬 5 posts</span>
                    </div>
                    <a href="{{ route('cohorts.show', 'advanced-seo') }}" class="inline-flex items-center px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700">
                        View Cohort →
                    </a>
                </div>
            </article>

            {{-- Cohort 3 --}}
            <article class="bg-white rounded-xl shadow-sm hover:shadow-xl transition-all overflow-hidden group cursor-pointer border border-gray-200">
                <div class="p-6">
                    <div class="flex items-start gap-4 mb-4">
                        <img src="{{ asset('assets/images/cohort-video-marketing.png') }}" alt="Video Marketing" class="w-20 h-20 rounded-xl object-cover">
                        <div class="flex-1">
                            <span class="inline-block px-3 py-1 bg-pink-100 text-pink-800 text-xs font-semibold rounded-full mb-2">Cohort 3</span>
                            <h3 class="text-xl font-bold text-gray-900 group-hover:text-pink-600">Video Marketing</h3>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">Harness the power of video to engage, inspire, and convert.</p>
                    <div class="flex items-center gap-4 text-sm text-gray-500 mb-4">
                        <span>👥 3 members</span>
                        <span>💬 5 posts</span>
                    </div>
                    <a href="{{ route('cohorts.show', 'video-marketing') }}" class="inline-flex items-center px-4 py-2 bg-pink-600 text-white rounded-lg hover:bg-pink-700">
                        View Cohort →
                    </a>
                </div>
            </article>

            {{-- Cohort 4 --}}
            <article class="bg-white rounded-xl shadow-sm hover:shadow-xl transition-all overflow-hidden group cursor-pointer border border-gray-200">
                <div class="p-6">
                    <div class="flex items-start gap-4 mb-4">
                        <img src="{{ asset('assets/images/cohort-content-marketing.png') }}" alt="Content Marketing" class="w-20 h-20 rounded-xl object-cover">
                        <div class="flex-1">
                            <span class="inline-block px-3 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded-full mb-2">Cohort 4</span>
                            <h3 class="text-xl font-bold text-gray-900 group-hover:text-green-600">Content Marketing</h3>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">Create compelling content that captivates audiences and drives results.</p>
                    <div class="flex items-center gap-4 text-sm text-gray-500 mb-4">
                        <span>👥 3 members</span>
                        <span>💬 5 posts</span>
                    </div>
                    <a href="{{ route('cohorts.show', 'content-marketing') }}" class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                        View Cohort →
                    </a>
                </div>
            </article>
        </div>
    </div>
</x-layouts.app>
