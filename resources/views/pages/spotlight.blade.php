<x-layouts.app title="Spotlight">
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        {{-- Hero Section --}}
        <section class="mb-12">
            <div class="flex items-start gap-4 mb-8">
                <div class="w-16 h-16 bg-indigo-100 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-8 h-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-4xl font-bold text-gray-900 mb-3">Spotlight</h1>
                    <p class="text-lg text-gray-600">
                        Come and join us in giving a big round of applause for our amazing colleagues and their impressive work results!
                    </p>
                </div>
            </div>
        </section>

        {{-- Success Stories Grid --}}
        <section class="mb-12">
            <div class="grid md:grid-cols-3 gap-6">
                
                {{-- Story 1: Jennifer White --}}
                <article class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-lg transition-shadow">
                    <div class="mb-6">
                        <div class="relative w-full h-48 bg-gradient-to-br from-purple-100 via-indigo-100 to-blue-100 rounded-xl flex items-center justify-center overflow-hidden">
                            <div class="absolute top-4 left-4">
                                <svg class="w-12 h-12 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                                </svg>
                            </div>
                            <div class="absolute bottom-4 right-4">
                                <svg class="w-16 h-16 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                </svg>
                            </div>
                            <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center shadow-lg">
                                <div class="w-20 h-20 bg-gradient-to-br from-purple-400 to-indigo-500 rounded-full flex items-center justify-center text-white text-2xl font-bold">
                                    JW
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Jennifer White got promoted to Head of Marketing</h3>
                    <p class="text-gray-600 mb-4">
                        Let's congrats Jennifer White, a student of our cohort #2, who was promoted to Head of Marketing earlier this week.
                    </p>
                </article>

                {{-- Story 2: John Carter --}}
                <article class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-lg transition-shadow">
                    <div class="mb-6">
                        <div class="relative w-full h-48 bg-gradient-to-br from-blue-100 via-cyan-100 to-teal-100 rounded-xl flex items-center justify-center overflow-hidden">
                            <div class="absolute top-4 left-4">
                                <svg class="w-12 h-12 text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <div class="absolute bottom-4 right-4">
                                <svg class="w-16 h-16 text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center shadow-lg">
                                <div class="w-20 h-20 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-full flex items-center justify-center text-white text-2xl font-bold">
                                    JC
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">John Carter lands a dream marketing job</h3>
                    <p class="text-gray-600 mb-4">
                        Hats off to John Carter, a fellow learner from cohort #3, who recently secured his dream job in marketing. His dedication paid off!
                    </p>
                </article>

                {{-- Story 3: Jessica's Campaign --}}
                <article class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-lg transition-shadow">
                    <div class="mb-6">
                        <div class="relative w-full h-48 bg-gradient-to-br from-pink-100 via-rose-100 to-red-100 rounded-xl flex items-center justify-center overflow-hidden">
                            <div class="absolute top-4 left-4">
                                <svg class="w-12 h-12 text-pink-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
                                </svg>
                            </div>
                            <div class="absolute bottom-4 right-4">
                                <svg class="w-16 h-16 text-pink-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center shadow-lg">
                                <div class="w-20 h-20 bg-gradient-to-br from-pink-400 to-rose-500 rounded-full flex items-center justify-center text-white text-2xl font-bold">
                                    JM
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Celebrating Jessica's campaign success</h3>
                    <p class="text-gray-600 mb-4">
                        Let's applaud Jessica for her outstanding campaign, which exceeded all expectations with record-breaking results. Amazing work!
                    </p>
                </article>

            </div>
        </section>

        {{-- Submit Story CTA --}}
        <section class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl p-8 border border-indigo-100">
            <div class="flex items-center gap-6">
                <div class="flex-shrink-0">
                    <div class="w-16 h-16 bg-indigo-500 rounded-xl flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                </div>
                <div class="flex-1">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Submit your story!</h3>
                    <p class="text-gray-600">
                        Got a raise, a special job promotion, or completed one big goal you were chasing for a few years? Tell us about it, and let us feature your story.
                    </p>
                </div>
                <div class="flex-shrink-0">
                    <button class="px-6 py-3 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700 transition-colors">
                        Send story
                    </button>
                </div>
            </div>
        </section>

    </main>
</x-layouts.app>
