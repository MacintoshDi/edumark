<x-layouts.app title="Showcase">
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        {{-- Hero Section --}}
        <section class="mb-12">
            <div class="flex items-start justify-between gap-12">
                {{-- Left - Text --}}
                <div class="flex-1">
                    <div class="flex items-start gap-4">
                        <div class="w-14 h-14 bg-indigo-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-7 h-7 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-4xl font-bold text-gray-900 mb-3">Showcase</h1>
                            <p class="text-base text-gray-600">
                                Discover inspiring projects where you can put your skills and impress employers.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Right - Laptop Illustration --}}
                <div class="w-80 flex-shrink-0">
                    <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl p-8 border border-indigo-100">
                        <svg class="w-full h-auto" viewBox="0 0 300 200" fill="none">
                            {{-- Laptop base --}}
                            <rect x="30" y="160" width="240" height="8" rx="4" fill="#6366F1"/>
                            <rect x="20" y="168" width="260" height="12" rx="2" fill="#4F46E5"/>
                            
                            {{-- Laptop screen --}}
                            <rect x="60" y="40" width="180" height="120" rx="8" fill="#4F46E5"/>
                            <rect x="70" y="50" width="160" height="100" rx="4" fill="white"/>
                            
                            {{-- Screen content - folder icon --}}
                            <path d="M90 70 L90 90 L130 90 L130 70 L110 70 L105 65 L90 65 Z" fill="#6366F1" opacity="0.3"/>
                            <rect x="140" y="65" width="50" height="30" rx="4" fill="#6366F1" opacity="0.3"/>
                            
                            {{-- Floating elements --}}
                            <circle cx="200" cy="60" r="8" fill="#8B5CF6" opacity="0.5"/>
                            <rect x="85" y="105" width="40" height="6" rx="3" fill="#A5B4FC"/>
                            <rect x="85" y="115" width="60" height="6" rx="3" fill="#A5B4FC"/>
                            <rect x="85" y="125" width="50" height="6" rx="3" fill="#A5B4FC"/>
                            
                            {{-- Decorative lines --}}
                            <line x1="140" y1="105" x2="190" y2="105" stroke="#C7D2FE" stroke-width="3" stroke-linecap="round"/>
                            <line x1="140" y1="115" x2="180" y2="115" stroke="#C7D2FE" stroke-width="3" stroke-linecap="round"/>
                            <line x1="140" y1="125" x2="195" y2="125" stroke="#C7D2FE" stroke-width="3" stroke-linecap="round"/>
                        </svg>
                    </div>
                </div>
            </div>
        </section>

        {{-- Projects Grid --}}
        <section>
            <div class="grid md:grid-cols-2 gap-6">
                
                {{-- Project 1: Social Media Engagement --}}
                <article class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                    {{-- Project Screenshot --}}
                    <div class="h-48 bg-gradient-to-br from-blue-100 to-indigo-100 p-6 flex items-center justify-center">
                        <svg class="w-full h-full" viewBox="0 0 400 200" fill="none">
                            {{-- Dashboard mockup --}}
                            <rect x="20" y="20" width="360" height="160" rx="8" fill="white"/>
                            <rect x="30" y="30" width="140" height="8" rx="4" fill="#C7D2FE"/>
                            <rect x="30" y="50" width="100" height="6" rx="3" fill="#E0E7FF"/>
                            
                            {{-- Bar chart --}}
                            <rect x="50" y="120" width="30" height="40" rx="4" fill="#6366F1"/>
                            <rect x="90" y="100" width="30" height="60" rx="4" fill="#8B5CF6"/>
                            <rect x="130" y="80" width="30" height="80" rx="4" fill="#A78BFA"/>
                            <rect x="170" y="90" width="30" height="70" rx="4" fill="#C4B5FD"/>
                            
                            {{-- Stats circles --}}
                            <circle cx="280" cy="80" r="40" fill="#EEF2FF"/>
                            <circle cx="280" cy="80" r="30" fill="#6366F1" opacity="0.3"/>
                            <text x="280" y="85" text-anchor="middle" fill="#4F46E5" font-size="16" font-weight="bold">300%</text>
                        </svg>
                    </div>
                    
                    {{-- Project Info --}}
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Boosted Social Media Engagement by 300%</h3>
                        <p class="text-sm text-gray-600 mb-4">
                            Through strategic community management and content optimization, we increased engagement rates from 2% to 8% across all platforms within 6 months.
                        </p>
                        <div class="flex items-center gap-2">
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">
                                Social Media
                            </span>
                            <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-medium">
                                Community
                            </span>
                        </div>
                    </div>
                </article>

                {{-- Project 2: ROI with Targeted Ads --}}
                <article class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                    {{-- Project Screenshot --}}
                    <div class="h-48 bg-gradient-to-br from-green-100 to-teal-100 p-6 flex items-center justify-center">
                        <svg class="w-full h-full" viewBox="0 0 400 200" fill="none">
                            {{-- Ads dashboard --}}
                            <rect x="20" y="20" width="360" height="160" rx="8" fill="white"/>
                            
                            {{-- Ad preview cards --}}
                            <rect x="40" y="40" width="100" height="120" rx="6" fill="#D1FAE5"/>
                            <rect x="50" y="50" width="80" height="60" rx="4" fill="#10B981" opacity="0.2"/>
                            <rect x="50" y="120" width="60" height="4" rx="2" fill="#6EE7B7"/>
                            <rect x="50" y="130" width="70" height="4" rx="2" fill="#6EE7B7"/>
                            
                            <rect x="150" y="40" width="100" height="120" rx="6" fill="#D1FAE5"/>
                            <rect x="160" y="50" width="80" height="60" rx="4" fill="#10B981" opacity="0.2"/>
                            <rect x="160" y="120" width="60" height="4" rx="2" fill="#6EE7B7"/>
                            <rect x="160" y="130" width="70" height="4" rx="2" fill="#6EE7B7"/>
                            
                            {{-- ROI indicator --}}
                            <circle cx="310" cy="100" r="50" fill="#ECFDF5"/>
                            <path d="M310 80 L330 100 L310 120 Z" fill="#10B981"/>
                            <text x="310" y="145" text-anchor="middle" fill="#059669" font-size="14" font-weight="bold">150% ROI</text>
                        </svg>
                    </div>
                    
                    {{-- Project Info --}}
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Achieved 150% ROI with targeted ads</h3>
                        <p class="text-sm text-gray-600 mb-4">
                            Strategic paid ad campaigns across Facebook and Google ads generated $150k in revenue from a $60k ad spend using advanced audience targeting.
                        </p>
                        <div class="flex items-center gap-2">
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">
                                Paid Ads
                            </span>
                            <span class="px-3 py-1 bg-teal-100 text-teal-700 rounded-full text-xs font-medium">
                                ROI
                            </span>
                        </div>
                    </div>
                </article>

                {{-- Project 3: Email Campaign Success --}}
                <article class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                    {{-- Project Screenshot --}}
                    <div class="h-48 bg-gradient-to-br from-orange-100 to-red-100 p-6 flex items-center justify-center">
                        <svg class="w-full h-full" viewBox="0 0 400 200" fill="none">
                            {{-- Email dashboard --}}
                            <rect x="20" y="20" width="360" height="160" rx="8" fill="white"/>
                            
                            {{-- Email list --}}
                            <rect x="40" y="40" width="320" height="20" rx="4" fill="#FED7AA"/>
                            <circle cx="55" cy="50" r="6" fill="#F97316"/>
                            <rect x="70" y="46" width="100" height="4" rx="2" fill="#FB923C"/>
                            <rect x="70" y="52" width="80" height="3" rx="1.5" fill="#FDBA74"/>
                            
                            <rect x="40" y="70" width="320" height="20" rx="4" fill="#FED7AA"/>
                            <circle cx="55" cy="80" r="6" fill="#F97316"/>
                            <rect x="70" y="76" width="100" height="4" rx="2" fill="#FB923C"/>
                            <rect x="70" y="82" width="80" height="3" rx="1.5" fill="#FDBA74"/>
                            
                            <rect x="40" y="100" width="320" height="20" rx="4" fill="#FED7AA"/>
                            <circle cx="55" cy="110" r="6" fill="#F97316"/>
                            <rect x="70" y="106" width="100" height="4" rx="2" fill="#FB923C"/>
                            <rect x="70" y="112" width="80" height="3" rx="1.5" fill="#FDBA74"/>
                            
                            {{-- Open rate badge --}}
                            <rect x="250" y="130" width="100" height="30" rx="15" fill="#F97316"/>
                            <text x="300" y="150" text-anchor="middle" fill="white" font-size="14" font-weight="bold">40% Open</text>
                        </svg>
                    </div>
                    
                    {{-- Project Info --}}
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Email Campaign Success: 40% Open Rate</h3>
                        <p class="text-sm text-gray-600 mb-4">
                            Redesigned email nurture sequence with personalized subject lines and segmented content achieved 40% open rates and 12% click-through rates.
                        </p>
                        <div class="flex items-center gap-2">
                            <span class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-xs font-medium">
                                Email Marketing
                            </span>
                            <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-medium">
                                Automation
                            </span>
                        </div>
                    </div>
                </article>

                {{-- Project 4: Website Traffic Growth --}}
                <article class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                    {{-- Project Screenshot --}}
                    <div class="h-48 bg-gradient-to-br from-purple-100 to-pink-100 p-6 flex items-center justify-center">
                        <svg class="w-full h-full" viewBox="0 0 400 200" fill="none">
                            {{-- Analytics dashboard --}}
                            <rect x="20" y="20" width="360" height="160" rx="8" fill="white"/>
                            
                            {{-- Traffic graph --}}
                            <polyline points="40,140 80,120 120,100 160,90 200,70 240,60 280,50 320,40 360,35" 
                                      stroke="#A78BFA" stroke-width="4" fill="none" stroke-linecap="round"/>
                            <polyline points="40,140 80,120 120,100 160,90 200,70 240,60 280,50 320,40 360,35 360,160 40,160" 
                                      fill="#E9D5FF" opacity="0.3"/>
                            
                            {{-- Data points --}}
                            <circle cx="40" cy="140" r="6" fill="#8B5CF6"/>
                            <circle cx="120" cy="100" r="6" fill="#8B5CF6"/>
                            <circle cx="200" cy="70" r="6" fill="#8B5CF6"/>
                            <circle cx="280" cy="50" r="6" fill="#8B5CF6"/>
                            <circle cx="360" cy="35" r="6" fill="#8B5CF6"/>
                            
                            {{-- Stats label --}}
                            <text x="200" y="50" text-anchor="middle" fill="#7C3AED" font-size="24" font-weight="bold">3x</text>
                            <text x="200" y="70" text-anchor="middle" fill="#A78BFA" font-size="12">Traffic Growth</text>
                        </svg>
                    </div>
                    
                    {{-- Project Info --}}
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Tripled Website Traffic in 3 Months</h3>
                        <p class="text-sm text-gray-600 mb-4">
                            Using SEO optimization, content marketing, and strategic link building, we increased organic traffic from 5,000 to 15,000 monthly visitors in just 3 months.
                        </p>
                        <div class="flex items-center gap-2">
                            <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-medium">
                                SEO
                            </span>
                            <span class="px-3 py-1 bg-pink-100 text-pink-700 rounded-full text-xs font-medium">
                                Content
                            </span>
                        </div>
                    </div>
                </article>

            </div>
        </section>

    </main>
</x-layouts.app>
