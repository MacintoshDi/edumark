<x-layouts.app title="Student Directory">
    <div class="mb-8">
        <div class="flex items-center gap-4 mb-6">
            <img src="{{ asset('assets/images/directory-header-icon.png') }}" alt="Directory" class="w-12 h-12">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Student Directory</h1>
                <p class="text-gray-600">Connect with fellow marketing students from all cohorts</p>
            </div>
        </div>

        {{-- Filters --}}
        <div class="bg-white rounded-xl shadow-sm p-4 mb-6">
            <div class="flex flex-wrap gap-2">
                <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium">All Cohorts</button>
                <button class="px-4 py-2 bg-white border border-gray-300 hover:bg-gray-50 rounded-lg text-sm font-medium">Cohort 1</button>
                <button class="px-4 py-2 bg-white border border-gray-300 hover:bg-gray-50 rounded-lg text-sm font-medium">Cohort 2</button>
                <button class="px-4 py-2 bg-white border border-gray-300 hover:bg-gray-50 rounded-lg text-sm font-medium">Cohort 3</button>
                <button class="px-4 py-2 bg-white border border-gray-300 hover:bg-gray-50 rounded-lg text-sm font-medium">Cohort 4</button>
            </div>
        </div>

        {{-- Students Grid --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            {{-- Sample Student Cards --}}
            @for ($i = 1; $i <= 6; $i++)
            <article class="bg-white rounded-xl shadow-sm p-6 hover:shadow-lg transition-shadow">
                <div class="flex items-start gap-4 mb-4">
                    <img src="{{ asset('assets/images/avatars/daniel-wilson.jpg') }}" alt="Student" class="w-16 h-16 rounded-full object-cover">
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-gray-900">Student Name</h3>
                        <p class="text-sm text-gray-600">Digital Marketing Specialist</p>
                        <p class="text-sm text-gray-500 flex items-center gap-1 mt-1">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>
                            New York, USA
                        </p>
                    </div>
                </div>
                <div class="flex flex-wrap gap-2 mb-4">
                    <span class="px-2 py-1 bg-indigo-100 text-indigo-800 text-xs rounded-full">SEO</span>
                    <span class="px-2 py-1 bg-purple-100 text-purple-800 text-xs rounded-full">Content</span>
                </div>
                <button class="w-full px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 text-sm font-medium">
                    Connect
                </button>
            </article>
            @endfor
        </div>
    </div>
</x-layouts.app>
