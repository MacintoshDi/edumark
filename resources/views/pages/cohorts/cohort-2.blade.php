<x-layouts.app title="Cohort 2: Advanced SEO">
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        {{-- Header --}}
        <header class="bg-white rounded-2xl p-6 mb-6 flex items-center justify-between flex-wrap gap-4">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 bg-purple-500 text-white rounded-xl flex items-center justify-center text-3xl font-bold flex-shrink-0">
                    2
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Cohort 2: Advanced SEO</h1>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <button class="px-4 py-2 border-2 border-gray-900 text-gray-900 rounded-full hover:bg-gray-50 font-medium flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Join
                </button>
                <button class="p-2 border-2 border-gray-900 rounded-full hover:bg-gray-50">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                </button>
                <button class="p-2 border-2 border-gray-900 rounded-full hover:bg-gray-50">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                    </svg>
                </button>
            </div>
        </header>

        {{-- Discussions Section --}}
        <section class="mb-8" x-data="{ activeFilter: 'Questions' }">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Discussions</h2>
            
            <div class="flex gap-2 mb-6">
                <button @click="activeFilter = 'Questions'" 
                        :class="activeFilter === 'Questions' ? 'bg-indigo-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-50'"
                        class="px-6 py-2.5 rounded-full font-medium text-sm transition-colors border-2 border-transparent">
                    Questions
                </button>
                <button @click="activeFilter = 'Help'" 
                        :class="activeFilter === 'Help' ? 'border-indigo-600 text-indigo-600' : 'border-gray-300 text-gray-700 hover:bg-gray-50'"
                        class="px-6 py-2.5 bg-white rounded-full font-medium text-sm transition-colors border-2">
                    Help
                </button>
                <button @click="activeFilter = 'Guides'" 
                        :class="activeFilter === 'Guides' ? 'border-indigo-600 text-indigo-600' : 'border-gray-300 text-gray-700 hover:bg-gray-50'"
                        class="px-6 py-2.5 bg-white rounded-full font-medium text-sm transition-colors border-2">
                    Guides
                </button>
                <button @click="activeFilter = 'Feedback'" 
                        :class="activeFilter === 'Feedback' ? 'border-indigo-600 text-indigo-600' : 'border-gray-300 text-gray-700 hover:bg-gray-50'"
                        class="px-6 py-2.5 bg-white rounded-full font-medium text-sm transition-colors border-2">
                    Feedback
                </button>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                {{-- Discussion Card 1 --}}
                <article class="bg-white rounded-xl border border-gray-200 p-5 hover:shadow-lg transition-shadow cursor-pointer">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-md text-xs font-medium">Questions</span>
                        <div class="flex items-center gap-1 text-sm text-gray-500">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span>a year ago</span>
                        </div>
                    </div>
                    <h3 class="text-base font-bold text-gray-900 mb-4">SEO Tips: A handy guide from class</h3>
                    <div class="flex items-center gap-4 text-sm text-gray-500">
                        <button class="flex items-center gap-1 hover:text-gray-700">
                            <span class="text-lg">👍</span>
                            <span>3</span>
                        </button>
                        <button class="flex items-center gap-1 hover:text-gray-700">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                            <span>0</span>
                        </button>
                        <button class="flex items-center gap-1 hover:text-gray-700">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                            <span>0</span>
                        </button>
                    </div>
                </article>

                {{-- Discussion Card 2 --}}
                <article class="bg-white rounded-xl border border-gray-200 p-5 hover:shadow-lg transition-shadow cursor-pointer">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-md text-xs font-medium">Questions</span>
                        <div class="flex items-center gap-1 text-sm text-gray-500">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span>a year ago</span>
                        </div>
                    </div>
                    <h3 class="text-base font-bold text-gray-900 mb-4">My Ultimate Guide to Advanced SEO Techniques</h3>
                    <div class="flex items-center gap-4 text-sm text-gray-500">
                        <button class="flex items-center gap-1 hover:text-gray-700">
                            <span class="text-lg">👍</span>
                            <span>8</span>
                        </button>
                        <button class="flex items-center gap-1 hover:text-gray-700">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                            <span>0</span>
                        </button>
                        <button class="flex items-center gap-1 hover:text-gray-700">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                            <span>0</span>
                        </button>
                    </div>
                </article>

                {{-- Discussion Card 3 --}}
                <article class="bg-white rounded-xl border border-gray-200 p-5 hover:shadow-lg transition-shadow cursor-pointer">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-md text-xs font-medium">Questions</span>
                        <div class="flex items-center gap-1 text-sm text-gray-500">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span>a year ago</span>
                        </div>
                    </div>
                    <h3 class="text-base font-bold text-gray-900 mb-4">Advanced Keyword Research Strategies</h3>
                    <div class="flex items-center gap-4 text-sm text-gray-500">
                        <button class="flex items-center gap-1 hover:text-gray-700">
                            <span class="text-lg">👍</span>
                            <span>12</span>
                        </button>
                        <button class="flex items-center gap-1 hover:text-gray-700">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                            <span>0</span>
                        </button>
                        <button class="flex items-center gap-1 hover:text-gray-700">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                            <span>0</span>
                        </button>
                    </div>
                </article>
            </div>
        </section>

        {{-- Assignments Section --}}
        <section class="mb-8" x-data="{ activeWeek: 'Week 1' }">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Assignments</h2>
            <p class="text-gray-600 mb-6">Your next level-up awaits! Complete assignments given by the cohort teacher.</p>

            <div class="flex gap-2 mb-6">
                <button @click="activeWeek = 'Week 1'" 
                        :class="activeWeek === 'Week 1' ? 'border-indigo-600 text-indigo-600' : 'border-gray-300 text-gray-700 hover:bg-gray-50'"
                        class="px-6 py-2.5 bg-white rounded-full font-medium text-sm transition-colors border-2">
                    Week 1
                </button>
                <button @click="activeWeek = 'Week 2'" 
                        :class="activeWeek === 'Week 2' ? 'border-indigo-600 text-indigo-600' : 'border-gray-300 text-gray-700 hover:bg-gray-50'"
                        class="px-6 py-2.5 bg-white rounded-full font-medium text-sm transition-colors border-2">
                    Week 2
                </button>
            </div>

            <div class="space-y-4">
                {{-- Week 1 Assignments --}}
                <div x-show="activeWeek === 'Week 1'" x-cloak class="space-y-4">
                    <article class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-lg transition-shadow cursor-pointer">
                        <div class="flex gap-4">
                            <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-gray-900 mb-2">SEO Audit and Optimization Plan (Week 1)</h3>
                                <p class="text-sm text-gray-600">Conduct a comprehensive SEO audit of a website of your choice and develop a detailed optimization plan. Objective: Introduction to fundamental SEO concepts. Learn how to analyze on-page SEO and off-page...</p>
                            </div>
                            <div class="flex items-center gap-4 text-sm text-gray-500 flex-shrink-0">
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span>a year ago</span>
                                </div>
                                <button class="flex items-center gap-1 hover:text-gray-700">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                    </svg>
                                    <span>0</span>
                                </button>
                                <button class="flex items-center gap-1 hover:text-gray-700">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                    </svg>
                                    <span>0</span>
                                </button>
                            </div>
                        </div>
                    </article>
                </div>

                {{-- Week 2 Assignments --}}
                <div x-show="activeWeek === 'Week 2'" x-cloak class="space-y-4">
                    <article class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-lg transition-shadow cursor-pointer">
                        <div class="flex gap-4">
                            <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-gray-900 mb-2">Advanced Link Building Strategy (Week 2)</h3>
                                <p class="text-sm text-gray-600">Develop and execute a comprehensive link building campaign that includes outreach, content marketing, and partnership strategies. Master the techniques for acquiring high-quality backlinks...</p>
                            </div>
                            <div class="flex items-center gap-4 text-sm text-gray-500 flex-shrink-0">
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span>a year ago</span>
                                </div>
                                <button class="flex items-center gap-1 hover:text-gray-700">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                    </svg>
                                    <span>0</span>
                                </button>
                                <button class="flex items-center gap-1 hover:text-gray-700">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                    </svg>
                                    <span>0</span>
                                </button>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        {{-- Resources Section --}}
        <section class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Resources</h2>
            <p class="text-gray-600 mb-6">Get all the resources you will need in one place!</p>

            <div class="grid md:grid-cols-3 gap-6">
                <article class="bg-white rounded-xl border border-gray-200 p-6 text-center hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 mx-auto mb-4 bg-indigo-100 rounded-lg flex items-center justify-center">
                        <svg class="w-8 h-8 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Course</h3>
                    <p class="text-gray-600 mb-4 text-sm">Go to our course platform</p>
                    <button class="w-full px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-medium transition-colors text-sm">
                        Go to course
                    </button>
                </article>

                <article class="bg-white rounded-xl border border-gray-200 p-6 text-center hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 mx-auto mb-4 bg-indigo-100 rounded-lg flex items-center justify-center">
                        <svg class="w-8 h-8 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Slides</h3>
                    <p class="text-gray-600 mb-4 text-sm">Download all slides as PPTX and PDF</p>
                    <button class="w-full px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-medium transition-colors text-sm">
                        Download
                    </button>
                </article>

                <article class="bg-white rounded-xl border border-gray-200 p-6 text-center hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 mx-auto mb-4 bg-indigo-100 rounded-lg flex items-center justify-center">
                        <svg class="w-8 h-8 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm3.293 1.293a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 01-1.414-1.414L7.586 10 5.293 7.707a1 1 0 010-1.414zM11 12a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Apps</h3>
                    <p class="text-gray-600 mb-4 text-sm">Access curated SEO tools collection</p>
                    <button class="w-full px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-medium transition-colors text-sm">
                        See tools
                    </button>
                </article>

                <article class="bg-white rounded-xl border border-gray-200 p-6 text-center hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 mx-auto mb-4 bg-indigo-100 rounded-lg flex items-center justify-center">
                        <svg class="w-8 h-8 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Templates</h3>
                    <p class="text-gray-600 mb-4 text-sm">SEO audit templates and checklists</p>
                    <button class="w-full px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-medium transition-colors text-sm">
                        Download
                    </button>
                </article>

                <article class="bg-white rounded-xl border border-gray-200 p-6 text-center hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 mx-auto mb-4 bg-indigo-100 rounded-lg flex items-center justify-center">
                        <svg class="w-8 h-8 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Quizzes</h3>
                    <p class="text-gray-600 mb-4 text-sm">Test your SEO knowledge</p>
                    <button class="w-full px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-medium transition-colors text-sm">
                        See quizzes
                    </button>
                </article>

                <article class="bg-white rounded-xl border border-gray-200 p-6 text-center hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 mx-auto mb-4 bg-indigo-100 rounded-lg flex items-center justify-center">
                        <svg class="w-8 h-8 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Newsletter</h3>
                    <p class="text-gray-600 mb-4 text-sm">Weekly SEO insights and updates</p>
                    <button class="w-full px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-medium transition-colors text-sm">
                        Subscribe
                    </button>
                </article>
            </div>
        </section>

        {{-- Support Card --}}
        <section>
            <div class="bg-blue-50 rounded-2xl p-8 flex items-start gap-6">
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Need support?</h3>
                    <p class="text-gray-600 mb-4">
                        If you have any problems with the platform or need any help from our support team, please feel free to send us an email to <a href="mailto:edumark@bettermode.io" class="text-indigo-600 hover:underline">edumark@bettermode.io</a>. We will be happy to help you
                    </p>
                    <button class="px-6 py-2.5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-medium">
                        Contact us
                    </button>
                </div>
            </div>
        </section>

    </main>
</x-layouts.app>
