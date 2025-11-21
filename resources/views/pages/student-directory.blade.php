<x-layouts.app title="Student Directory">
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        {{-- Hero Section --}}
        <section class="bg-gradient-to-br from-indigo-100 via-purple-50 to-pink-100 rounded-2xl p-12 mb-8 relative overflow-hidden">
            <div class="relative z-10 max-w-2xl">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Student Directory</h1>
                <p class="text-lg text-gray-600">
                    Exploring our network of talented and diverse students from all around the world. Connect and exchange ideas with them today!
                </p>
            </div>
            
            {{-- Illustration --}}
            <div class="absolute right-12 top-1/2 -translate-y-1/2 hidden lg:block">
                <svg class="w-40 h-40" viewBox="0 0 200 200" fill="none">
                    {{-- Three people illustration --}}
                    <circle cx="100" cy="80" r="25" fill="#818CF8" opacity="0.8"/>
                    <ellipse cx="100" cy="140" rx="35" ry="40" fill="#818CF8" opacity="0.8"/>
                    
                    <circle cx="50" cy="90" r="22" fill="#6366F1" opacity="0.9"/>
                    <ellipse cx="50" cy="145" rx="30" ry="35" fill="#6366F1" opacity="0.9"/>
                    
                    <circle cx="150" cy="90" r="22" fill="#4F46E5" opacity="0.9"/>
                    <ellipse cx="150" cy="145" rx="30" ry="35" fill="#4F46E5" opacity="0.9"/>
                </svg>
            </div>
        </section>

        {{-- Cohort Filters --}}
        <section class="mb-8" x-data="{ activeCohort: 'all' }">
            <div class="flex gap-2 mb-8">
                <button @click="activeCohort = 'all'" 
                        :class="activeCohort === 'all' ? 'bg-indigo-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-50'"
                        class="px-6 py-2.5 rounded-full font-medium text-sm transition-colors border-2 border-transparent">
                    Latest
                </button>
                <button @click="activeCohort = 'cohort2'" 
                        :class="activeCohort === 'cohort2' ? 'border-indigo-600 text-indigo-600' : 'border-gray-300 text-gray-700 hover:bg-gray-50'"
                        class="px-6 py-2.5 bg-white rounded-full font-medium text-sm transition-colors border-2">
                    Cohort 2
                </button>
                <button @click="activeCohort = 'cohort3'" 
                        :class="activeCohort === 'cohort3' ? 'border-indigo-600 text-indigo-600' : 'border-gray-300 text-gray-700 hover:bg-gray-50'"
                        class="px-6 py-2.5 bg-white rounded-full font-medium text-sm transition-colors border-2">
                    Cohort 3
                </button>
                <button @click="activeCohort = 'cohort4'" 
                        :class="activeCohort === 'cohort4' ? 'border-indigo-600 text-indigo-600' : 'border-gray-300 text-gray-700 hover:bg-gray-50'"
                        class="px-6 py-2.5 bg-white rounded-full font-medium text-sm transition-colors border-2">
                    Cohort 4
                </button>
            </div>

            {{-- Students Grid --}}
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                {{-- Student Card 1 - David Wilson --}}
                <article class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-lg transition-shadow cursor-pointer">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-xl font-bold text-indigo-600">DW</span>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-gray-900 text-lg mb-1">David Wilson</h3>
                            <div class="flex items-center gap-1 text-sm text-gray-500">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span>London</span>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-600">Email Marketing</p>
                        <p class="text-xs text-gray-500">Cohort 1</p>
                    </div>
                </article>

                {{-- Student Card 2 - Derek Anderson --}}
                <article class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-lg transition-shadow cursor-pointer">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-xl font-bold text-purple-600">DA</span>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-gray-900 text-lg mb-1">Derek Anderson</h3>
                            <div class="flex items-center gap-1 text-sm text-gray-500">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span>Austin</span>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-600">Social Media Marketing</p>
                        <p class="text-xs text-gray-500">New York, US</p>
                    </div>
                </article>

                {{-- Student Card 3 - Emily Davis --}}
                <article class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-lg transition-shadow cursor-pointer">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-xl font-bold text-pink-600">ED</span>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-gray-900 text-lg mb-1">Emily Davis</h3>
                            <div class="flex items-center gap-1 text-sm text-gray-500">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span>Houston</span>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-600">Market Research</p>
                        <p class="text-xs text-gray-500">Los Angeles, CA</p>
                    </div>
                </article>

                {{-- Student Card 4 - Jennifer White --}}
                <article class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-lg transition-shadow cursor-pointer">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-xl font-bold text-indigo-600">JW</span>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-gray-900 text-lg mb-1">Jennifer White</h3>
                            <div class="flex items-center gap-1 text-sm text-gray-500">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span>London</span>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-600">Content Creator</p>
                        <p class="text-xs text-gray-500">London, UK</p>
                    </div>
                </article>

                {{-- Student Card 5 - Joanna Harris --}}
                <article class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-lg transition-shadow cursor-pointer">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-xl font-bold text-purple-600">JH</span>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-gray-900 text-lg mb-1">Joanna Harris</h3>
                            <div class="flex items-center gap-1 text-sm text-gray-500">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span>Miami</span>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-600">Brand Specialist</p>
                        <p class="text-xs text-gray-500">San Jose, CA</p>
                    </div>
                </article>

                {{-- Student Card 6 - John Carper --}}
                <article class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-lg transition-shadow cursor-pointer">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-xl font-bold text-pink-600">JC</span>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-gray-900 text-lg mb-1">John Carper</h3>
                            <div class="flex items-center gap-1 text-sm text-gray-500">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span>Phoenix</span>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-600">Social Marketing</p>
                        <p class="text-xs text-gray-500">Saint Monica, TX</p>
                    </div>
                </article>

                {{-- Student Card 7 - Mike Johnson --}}
                <article class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-lg transition-shadow cursor-pointer">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-xl font-bold text-indigo-600">MJ</span>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-gray-900 text-lg mb-1">Mike Johnson</h3>
                            <div class="flex items-center gap-1 text-sm text-gray-500">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span>Austin</span>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-600">Brand Consultant</p>
                        <p class="text-xs text-gray-500">San Diego, CA</p>
                    </div>
                </article>

                {{-- Student Card 8 - Sarah Miller --}}
                <article class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-lg transition-shadow cursor-pointer">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-xl font-bold text-purple-600">SM</span>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-gray-900 text-lg mb-1">Sarah Miller</h3>
                            <div class="flex items-center gap-1 text-sm text-gray-500">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span>Dallas</span>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-600">Creative Marketing Coordinator</p>
                        <p class="text-xs text-gray-500">New York, NY</p>
                    </div>
                </article>

            </div>
        </section>

    </main>
</x-layouts.app>
