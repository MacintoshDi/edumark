<x-layouts.app title="Cohort Details">
    <div class="mb-8" x-data="{ activeTab: 'discussions' }">
        {{-- Header --}}
        <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
            <div class="flex items-start justify-between">
                <div class="flex items-center gap-4">
                    <img src="{{ asset('assets/images/cohort-growth-marketing.png') }}" alt="Cohort" class="w-20 h-20 rounded-xl">
                    <div>
                        <span class="inline-block px-3 py-1 bg-indigo-100 text-indigo-800 text-xs font-semibold rounded-full mb-2">Cohort 1</span>
                        <h1 class="text-3xl font-bold text-gray-900">Growth Marketing</h1>
                        <p class="text-gray-600 mt-1">3 members • 10 posts</p>
                    </div>
                </div>
                <a href="https://edumark.bettermode.io" target="_blank" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                    Go to our course platform →
                </a>
            </div>
        </div>

        {{-- Tabs Navigation --}}
        <div class="bg-white rounded-xl shadow-sm mb-6">
            <nav class="flex border-b border-gray-200 px-6">
                <button @click="activeTab = 'discussions'" 
                        class="px-4 py-4 text-sm font-medium border-b-2 transition-colors"
                        :class="activeTab === 'discussions' ? 'border-indigo-600 text-indigo-600' : 'border-transparent text-gray-600 hover:text-gray-900'">
                    Discussions
                </button>
                <button @click="activeTab = 'assignments'" 
                        class="px-4 py-4 text-sm font-medium border-b-2 transition-colors"
                        :class="activeTab === 'assignments' ? 'border-indigo-600 text-indigo-600' : 'border-transparent text-gray-600 hover:text-gray-900'">
                    Assignments
                </button>
                <button @click="activeTab = 'resources'" 
                        class="px-4 py-4 text-sm font-medium border-b-2 transition-colors"
                        :class="activeTab === 'resources' ? 'border-indigo-600 text-indigo-600' : 'border-transparent text-gray-600 hover:text-gray-900'">
                    Resources
                </button>
            </nav>

            {{-- Tab Content --}}
            <div class="p-6">
                {{-- Discussions Tab --}}
                <div x-show="activeTab === 'discussions'" class="space-y-4">
                    <p class="text-gray-600 mb-4">Stay tuned for cohort discussions...</p>
                    <div class="bg-gray-50 rounded-lg p-6 text-center">
                        <p class="text-gray-500">No discussions yet. Be the first to start one!</p>
                    </div>
                </div>

                {{-- Assignments Tab --}}
                <div x-show="activeTab === 'assignments'" x-cloak class="space-y-4">
                    <p class="text-gray-600 mb-4">Stay tuned for the weekly assignments...</p>
                    <div class="bg-gray-50 rounded-lg p-6 text-center">
                        <p class="text-gray-500">Assignments will be posted here weekly!</p>
                    </div>
                </div>

                {{-- Resources Tab --}}
                <div x-show="activeTab === 'resources'" x-cloak class="space-y-4">
                    <p class="text-gray-600 mb-4">Get all the resources you will need in one place!</p>
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="bg-white border rounded-lg p-4">
                            <div class="text-2xl mb-2">📚</div>
                            <h3 class="font-semibold">Course Materials</h3>
                            <p class="text-sm text-gray-600">Access all course slides and PDFs</p>
                        </div>
                        <div class="bg-white border rounded-lg p-4">
                            <div class="text-2xl mb-2">💻</div>
                            <h3 class="font-semibold">Marketing Tools</h3>
                            <p class="text-sm text-gray-600">Templates and software recommendations</p>
                        </div>
                        <div class="bg-white border rounded-lg p-4">
                            <div class="text-2xl mb-2">✅</div>
                            <h3 class="font-semibold">Quizzes</h3>
                            <p class="text-sm text-gray-600">Test your knowledge</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Support Widget --}}
        <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl p-6">
            <h3 class="text-lg font-bold text-gray-900 mb-2">Need support?</h3>
            <p class="text-gray-600 mb-4">
                If you have any problems with the platform or need any help from our support team, please feel free to send us an email at 
                <a href="mailto:[email protected]" class="text-indigo-600 hover:text-indigo-700 font-medium">[email protected]</a>
            </p>
            <p class="text-sm text-gray-500">We will be happy to help you!</p>
        </div>
    </div>
</x-layouts.app>
