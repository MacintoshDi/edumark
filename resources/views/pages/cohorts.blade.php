<x-layouts.app title="Cohorts">
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        {{-- Header Section --}}
        <section class="mb-12">
            <div class="flex items-start justify-between mb-6">
                <div class="flex items-start gap-4">
                    {{-- Books Icon --}}
                    <div class="w-16 h-16 flex-shrink-0">
                        <svg viewBox="0 0 64 64" fill="none" class="w-full h-full">
                            <rect x="8" y="16" width="32" height="40" rx="2" fill="#4F46E5" opacity="0.8"/>
                            <rect x="16" y="12" width="32" height="40" rx="2" fill="#6366F1" opacity="0.9"/>
                            <rect x="24" y="8" width="32" height="40" rx="2" fill="#818CF8"/>
                            <path d="M40 8 L40 48" stroke="white" stroke-width="2" opacity="0.5"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-4xl font-bold text-gray-900 mb-3">Cohorts</h1>
                        <p class="text-lg text-gray-600">
                            Welcome to the community-led cohorts at Edumark. Select your cohort below.
                        </p>
                    </div>
                </div>
                
                {{-- Badge --}}
                <div class="flex items-center gap-2 px-4 py-2 bg-green-500 text-white rounded-full text-sm font-medium">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>Made in Bettermode</span>
                </div>
            </div>
        </section>

        {{-- Cohorts Grid --}}
        <section class="grid md:grid-cols-2 gap-6">
            
            {{-- Cohort 1: Growth Marketing --}}
            <article class="bg-gradient-to-br from-indigo-400 to-purple-500 rounded-2xl p-8 text-white relative overflow-hidden group hover:shadow-2xl transition-shadow cursor-pointer">
                <div class="absolute top-6 right-6 text-9xl font-bold opacity-20">1</div>
                
                <div class="relative z-10">
                    <div class="w-20 h-20 mb-6">
                        <svg viewBox="0 0 80 80" fill="none" class="w-full h-full">
                            {{-- Megaphone Icon --}}
                            <path d="M55 25 L25 40 L25 55 L35 50 L45 65 L50 60 L42 48 L55 43 Z" fill="white" opacity="0.9"/>
                            <circle cx="58" cy="28" r="4" fill="white" opacity="0.7"/>
                            <circle cx="62" cy="35" r="3" fill="white" opacity="0.7"/>
                            <circle cx="60" cy="22" r="2.5" fill="white" opacity="0.7"/>
                        </svg>
                    </div>

                    <div class="flex items-center gap-4 mb-3">
                        <span class="text-sm font-medium opacity-90">👥 5 members</span>
                        <span class="text-sm font-medium opacity-90">💬 12 posts</span>
                    </div>

                    <h2 class="text-2xl font-bold mb-3">Cohort 1: Growth Marketing</h2>
                    
                    <p class="text-white/90 mb-6">
                        Growth hackers unite! Join fellow marketers to discuss rapid growth tactics, analyze user acquisition funnels, and explore creative marketing strategies!
                    </p>

                    <a href="{{ route('cohorts.growth-marketing') }}" 
                       class="inline-flex items-center gap-2 px-6 py-3 bg-white text-indigo-600 rounded-lg font-medium hover:bg-gray-100 transition-colors">
                        Join
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </article>

            {{-- Cohort 2: Advanced SEO --}}
            <article class="bg-gradient-to-br from-purple-400 to-pink-500 rounded-2xl p-8 text-white relative overflow-hidden group hover:shadow-2xl transition-shadow cursor-pointer">
                <div class="absolute top-6 right-6 text-9xl font-bold opacity-20">2</div>
                
                <div class="relative z-10">
                    <div class="w-20 h-20 mb-6">
                        <svg viewBox="0 0 80 80" fill="none" class="w-full h-full">
                            {{-- Search/Magnifying Glass Icon --}}
                            <rect x="15" y="15" width="35" height="28" rx="3" stroke="white" stroke-width="3" fill="none" opacity="0.9"/>
                            <line x1="15" y1="23" x2="50" y2="23" stroke="white" stroke-width="2" opacity="0.7"/>
                            <circle cx="50" cy="50" r="12" stroke="white" stroke-width="3" fill="none" opacity="0.9"/>
                            <line x1="59" y1="59" x2="68" y2="68" stroke="white" stroke-width="4" stroke-linecap="round" opacity="0.9"/>
                        </svg>
                    </div>

                    <div class="flex items-center gap-4 mb-3">
                        <span class="text-sm font-medium opacity-90">👥 8 members</span>
                        <span class="text-sm font-medium opacity-90">💬 24 posts</span>
                    </div>

                    <h2 class="text-2xl font-bold mb-3">Cohort 2: Advanced SEO</h2>
                    
                    <p class="text-white/90 mb-6">
                        Master the art of SEO! Network with specialists focusing on technical SEO, link-building strategies and content optimization!
                    </p>

                    <a href="{{ route('cohorts.advanced-seo') }}" 
                       class="inline-flex items-center gap-2 px-6 py-3 bg-white text-purple-600 rounded-lg font-medium hover:bg-gray-100 transition-colors">
                        Join
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </article>

            {{-- Cohort 3: Video Marketing --}}
            <article class="bg-gradient-to-br from-pink-400 to-red-500 rounded-2xl p-8 text-white relative overflow-hidden group hover:shadow-2xl transition-shadow cursor-pointer">
                <div class="absolute top-6 right-6 text-9xl font-bold opacity-20">3</div>
                
                <div class="relative z-10">
                    <div class="w-20 h-20 mb-6">
                        <svg viewBox="0 0 80 80" fill="none" class="w-full h-full">
                            {{-- Video Play Icon --}}
                            <rect x="15" y="20" width="50" height="35" rx="3" stroke="white" stroke-width="3" fill="none" opacity="0.9"/>
                            <circle cx="40" cy="37.5" r="12" fill="white" opacity="0.9"/>
                            <path d="M37 32 L37 43 L45 37.5 Z" fill="#EC4899"/>
                            <rect x="15" y="25" width="50" height="3" fill="white" opacity="0.5"/>
                        </svg>
                    </div>

                    <div class="flex items-center gap-4 mb-3">
                        <span class="text-sm font-medium opacity-90">👥 12 members</span>
                        <span class="text-sm font-medium opacity-90">💬 31 posts</span>
                    </div>

                    <h2 class="text-2xl font-bold mb-3">Cohort 3: Video Marketing</h2>
                    
                    <p class="text-white/90 mb-6">
                        Lights, camera, convert! A cohort for Reels, Youtube, TikTok, and content creators who are mastering video marketing and audience building!
                    </p>

                    <a href="{{ route('cohorts.video-marketing') }}" 
                       class="inline-flex items-center gap-2 px-6 py-3 bg-white text-pink-600 rounded-lg font-medium hover:bg-gray-100 transition-colors">
                        Join
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </article>

            {{-- Cohort 4: Content Marketing --}}
            <article class="bg-gradient-to-br from-orange-400 to-yellow-500 rounded-2xl p-8 text-white relative overflow-hidden group hover:shadow-2xl transition-shadow cursor-pointer">
                <div class="absolute top-6 right-6 text-9xl font-bold opacity-20">4</div>
                
                <div class="relative z-10">
                    <div class="w-20 h-20 mb-6">
                        <svg viewBox="0 0 80 80" fill="none" class="w-full h-full">
                            {{-- Notebook/Content Icon --}}
                            <rect x="20" y="15" width="40" height="50" rx="3" fill="white" opacity="0.9"/>
                            <rect x="22" y="12" width="6" height="6" rx="1" fill="#F59E0B"/>
                            <rect x="30" y="12" width="6" height="6" rx="1" fill="#F59E0B"/>
                            <line x1="28" y1="25" x2="52" y2="25" stroke="#F59E0B" stroke-width="2" stroke-linecap="round"/>
                            <line x1="28" y1="33" x2="52" y2="33" stroke="#F59E0B" stroke-width="2" stroke-linecap="round"/>
                            <line x1="28" y1="41" x2="52" y2="41" stroke="#F59E0B" stroke-width="2" stroke-linecap="round"/>
                            <line x1="28" y1="49" x2="45" y2="49" stroke="#F59E0B" stroke-width="2" stroke-linecap="round"/>
                            <path d="M50 45 L55 50 L65 38" stroke="#F59E0B" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                        </svg>
                    </div>

                    <div class="flex items-center gap-4 mb-3">
                        <span class="text-sm font-medium opacity-90">👥 6 members</span>
                        <span class="text-sm font-medium opacity-90">💬 18 posts</span>
                    </div>

                    <h2 class="text-2xl font-bold mb-3">Cohort 4: Content Marketing</h2>
                    
                    <p class="text-white/90 mb-6">
                        Create compelling content that captivates audiences and drives action — join us to share insights, collaborate, and refine your writing strategy!
                    </p>

                    <a href="{{ route('cohorts.content-marketing') }}" 
                       class="inline-flex items-center gap-2 px-6 py-3 bg-white text-orange-600 rounded-lg font-medium hover:bg-gray-100 transition-colors">
                        Join
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </article>

        </section>

    </main>
</x-layouts.app>
