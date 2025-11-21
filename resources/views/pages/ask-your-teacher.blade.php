<x-layouts.app title="Ask Your Teacher">
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        {{-- Hero Section --}}
        <section class="mb-12 bg-gray-50 rounded-2xl p-8 relative">
            <div class="flex items-start justify-between">
                <div class="flex items-start gap-4">
                    {{-- Question Icon --}}
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <span class="text-indigo-600 font-bold text-lg ml-11">?</span>
                    </div>
                    
                    <div>
                        <h1 class="text-4xl font-bold text-gray-900 mb-3">Ask Your Teacher</h1>
                        <p class="text-lg text-gray-600 max-w-md">
                            Get help from our expert instructors who are specialized and passionate.
                        </p>
                    </div>
                </div>
                
                {{-- Illustration --}}
                <div class="hidden lg:block">
                    <svg class="w-32 h-32" viewBox="0 0 120 140" fill="none">
                        {{-- Document/Paper --}}
                        <rect x="30" y="20" width="60" height="80" rx="4" fill="white" stroke="#818CF8" stroke-width="2"/>
                        <line x1="40" y1="35" x2="70" y2="35" stroke="#818CF8" stroke-width="2"/>
                        <line x1="40" y1="45" x2="75" y2="45" stroke="#818CF8" stroke-width="1.5"/>
                        <line x1="40" y1="52" x2="75" y2="52" stroke="#818CF8" stroke-width="1.5"/>
                        <line x1="40" y1="59" x2="65" y2="59" stroke="#818CF8" stroke-width="1.5"/>
                        
                        {{-- Person --}}
                        <circle cx="85" cy="85" r="20" fill="#818CF8"/>
                        <ellipse cx="85" cy="120" rx="22" ry="25" fill="#6366F1"/>
                        
                        {{-- Question mark bubble --}}
                        <circle cx="95" cy="60" r="15" fill="white" stroke="#818CF8" stroke-width="2"/>
                        <text x="95" y="68" text-anchor="middle" fill="#818CF8" font-size="20" font-weight="bold">?</text>
                    </svg>
                </div>
            </div>
        </section>

        {{-- Teachers Grid --}}
        <section class="grid md:grid-cols-2 gap-6">
            
            {{-- Teacher 1: Sarah Johnson --}}
            <article class="relative rounded-2xl overflow-hidden">
                {{-- Background with decorative elements --}}
                <div class="bg-gradient-to-br from-indigo-400 via-purple-400 to-indigo-500 p-8 relative">
                    {{-- Decorative circles --}}
                    <div class="absolute top-10 left-10 w-32 h-32 bg-white/10 rounded-full"></div>
                    <div class="absolute bottom-10 right-10 w-24 h-24 bg-white/10 rounded-full"></div>
                    
                    {{-- Message Icon --}}
                    <div class="absolute top-4 right-4 w-10 h-10 bg-white rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </div>
                    
                    <div class="relative z-10 flex flex-col items-center text-center">
                        {{-- Avatar with speech bubbles --}}
                        <div class="relative mb-6">
                            {{-- Speech bubble decorations --}}
                            <div class="absolute -left-8 top-0 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg">
                                <svg class="w-5 h-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                            </div>
                            <div class="absolute -right-6 -bottom-4 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-lg">
                                <svg class="w-4 h-4 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                            </div>
                            
                            <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center shadow-xl border-4 border-white">
                                <span class="text-3xl font-bold text-indigo-600">SJ</span>
                            </div>
                        </div>

                        <h3 class="text-2xl font-bold text-white mb-3">Sarah Johnson</h3>
                        <p class="text-white/90 mb-6 text-sm leading-relaxed">
                            Sarah has over 15 years of experience in digital marketing and social media strategy. Skilled at using social media with influencer marketing.
                        </p>

                        <button class="w-full px-6 py-3 bg-white text-indigo-600 rounded-lg font-medium hover:bg-gray-100 transition-colors shadow-lg">
                            Ask a Question
                        </button>
                    </div>
                </div>
            </article>

            {{-- Teacher 2: Michael Smith --}}
            <article class="relative rounded-2xl overflow-hidden">
                <div class="bg-gradient-to-br from-purple-400 via-indigo-400 to-purple-500 p-8 relative">
                    <div class="absolute top-10 right-10 w-32 h-32 bg-white/10 rounded-full"></div>
                    <div class="absolute bottom-10 left-10 w-24 h-24 bg-white/10 rounded-full"></div>
                    
                    <div class="absolute top-4 right-4 w-10 h-10 bg-white rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </div>
                    
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="relative mb-6">
                            <div class="absolute -left-8 top-0 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg">
                                <svg class="w-5 h-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                            </div>
                            <div class="absolute -right-6 -bottom-4 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-lg">
                                <svg class="w-4 h-4 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                            </div>
                            
                            <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center shadow-xl border-4 border-white">
                                <span class="text-3xl font-bold text-purple-600">MS</span>
                            </div>
                        </div>

                        <h3 class="text-2xl font-bold text-white mb-3">Michael Smith</h3>
                        <p class="text-white/90 mb-6 text-sm leading-relaxed">
                            Michael Smith is an experienced digital marketer with a specialization in SEO and PPC advertising. He is a professional in search engine optimization.
                        </p>

                        <button class="w-full px-6 py-3 bg-white text-purple-600 rounded-lg font-medium hover:bg-gray-100 transition-colors shadow-lg">
                            Ask a Question
                        </button>
                    </div>
                </div>
            </article>

            {{-- Teacher 3: David Wilson --}}
            <article class="relative rounded-2xl overflow-hidden">
                <div class="bg-gradient-to-br from-blue-400 via-indigo-400 to-blue-500 p-8 relative">
                    <div class="absolute top-10 left-10 w-32 h-32 bg-white/10 rounded-full"></div>
                    <div class="absolute bottom-10 right-10 w-24 h-24 bg-white/10 rounded-full"></div>
                    
                    <div class="absolute top-4 right-4 w-10 h-10 bg-white rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </div>
                    
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="relative mb-6">
                            <div class="absolute -left-8 top-0 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg">
                                <svg class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                            </div>
                            <div class="absolute -right-6 -bottom-4 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-lg">
                                <svg class="w-4 h-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                            </div>
                            
                            <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center shadow-xl border-4 border-white">
                                <span class="text-3xl font-bold text-blue-600">DW</span>
                            </div>
                        </div>

                        <h3 class="text-2xl font-bold text-white mb-3">David Wilson</h3>
                        <p class="text-white/90 mb-6 text-sm leading-relaxed">
                            Specializes in email marketing with expertise in creating engaging campaigns. Helping students building automation and customer engagement.
                        </p>

                        <button class="w-full px-6 py-3 bg-white text-blue-600 rounded-lg font-medium hover:bg-gray-100 transition-colors shadow-lg">
                            Ask a Question
                        </button>
                    </div>
                </div>
            </article>

            {{-- Teacher 4: Emily Davis --}}
            <article class="relative rounded-2xl overflow-hidden">
                <div class="bg-gradient-to-br from-pink-400 via-purple-400 to-pink-500 p-8 relative">
                    <div class="absolute top-10 right-10 w-32 h-32 bg-white/10 rounded-full"></div>
                    <div class="absolute bottom-10 left-10 w-24 h-24 bg-white/10 rounded-full"></div>
                    
                    <div class="absolute top-4 right-4 w-10 h-10 bg-white rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-pink-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </div>
                    
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="relative mb-6">
                            <div class="absolute -left-8 top-0 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg">
                                <svg class="w-5 h-5 text-pink-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                            </div>
                            <div class="absolute -right-6 -bottom-4 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-lg">
                                <svg class="w-4 h-4 text-pink-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                            </div>
                            
                            <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center shadow-xl border-4 border-white">
                                <span class="text-3xl font-bold text-pink-600">ED</span>
                            </div>
                        </div>

                        <h3 class="text-2xl font-bold text-white mb-3">Emily Davis</h3>
                        <p class="text-white/90 mb-6 text-sm leading-relaxed">
                            Emily is an expert in market research and consumer insights, with a specialty in data-driven marketing strategies that help brands succeed.
                        </p>

                        <button class="w-full px-6 py-3 bg-white text-pink-600 rounded-lg font-medium hover:bg-gray-100 transition-colors shadow-lg">
                            Ask a Question
                        </button>
                    </div>
                </div>
            </article>

            {{-- Teacher 5: Jessica Brown --}}
            <article class="relative rounded-2xl overflow-hidden">
                <div class="bg-gradient-to-br from-purple-400 via-pink-400 to-purple-500 p-8 relative">
                    <div class="absolute top-10 left-10 w-32 h-32 bg-white/10 rounded-full"></div>
                    <div class="absolute bottom-10 right-10 w-24 h-24 bg-white/10 rounded-full"></div>
                    
                    <div class="absolute top-4 right-4 w-10 h-10 bg-white rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </div>
                    
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="relative mb-6">
                            <div class="absolute -left-8 top-0 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg">
                                <svg class="w-5 h-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                            </div>
                            <div class="absolute -right-6 -bottom-4 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-lg">
                                <svg class="w-4 h-4 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                            </div>
                            
                            <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center shadow-xl border-4 border-white">
                                <span class="text-3xl font-bold text-purple-600">JB</span>
                            </div>
                        </div>

                        <h3 class="text-2xl font-bold text-white mb-3">Jessica Brown</h3>
                        <p class="text-white/90 mb-6 text-sm leading-relaxed">
                            With a passion for brand management, Jessica specializes in developing memorable brand identities and executing creative campaigns.
                        </p>

                        <button class="w-full px-6 py-3 bg-white text-purple-600 rounded-lg font-medium hover:bg-gray-100 transition-colors shadow-lg">
                            Ask a Question
                        </button>
                    </div>
                </div>
            </article>

            {{-- Teacher 6: James Taylor --}}
            <article class="relative rounded-2xl overflow-hidden">
                <div class="bg-gradient-to-br from-indigo-400 via-blue-400 to-indigo-500 p-8 relative">
                    <div class="absolute top-10 right-10 w-32 h-32 bg-white/10 rounded-full"></div>
                    <div class="absolute bottom-10 left-10 w-24 h-24 bg-white/10 rounded-full"></div>
                    
                    <div class="absolute top-4 right-4 w-10 h-10 bg-white rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </div>
                    
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="relative mb-6">
                            <div class="absolute -left-8 top-0 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg">
                                <svg class="w-5 h-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                            </div>
                            <div class="absolute -right-6 -bottom-4 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-lg">
                                <svg class="w-4 h-4 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                            </div>
                            
                            <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center shadow-xl border-4 border-white">
                                <span class="text-3xl font-bold text-indigo-600">JT</span>
                            </div>
                        </div>

                        <h3 class="text-2xl font-bold text-white mb-3">James Taylor</h3>
                        <p class="text-white/90 mb-6 text-sm leading-relaxed">
                            James is a content marketing strategist focusing on storytelling and audience engagement to drive organic growth and brand loyalty.
                        </p>

                        <button class="w-full px-6 py-3 bg-white text-indigo-600 rounded-lg font-medium hover:bg-gray-100 transition-colors shadow-lg">
                            Ask a Question
                        </button>
                    </div>
                </div>
            </article>

        </section>

    </main>
</x-layouts.app>
