<x-layouts.app title="Connect">
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        {{-- Top Section - Two Cards Side by Side --}}
        <section class="grid md:grid-cols-2 gap-6 mb-8">
            
            {{-- Left Card - Connect Info --}}
            <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-8 border border-blue-100">
                <div class="flex items-start gap-4 mb-4">
                    <div class="w-12 h-12 bg-indigo-500 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Connect</h2>
                        <p class="text-sm text-gray-600">
                            Whether you're seeking assistance or eager to lend a helping hand, our Connect section is the right place.
                        </p>
                    </div>
                </div>
                
                {{-- Simple Network Illustration --}}
                <div class="mt-8 flex justify-center">
                    <svg width="200" height="120" viewBox="0 0 200 120" fill="none">
                        {{-- Top nodes --}}
                        <rect x="80" y="10" width="40" height="40" rx="8" fill="white" stroke="#6366F1" stroke-width="2"/>
                        <circle cx="100" cy="25" r="8" fill="#6366F1"/>
                        <path d="M88 38 Q100 35 112 38" stroke="#6366F1" stroke-width="2" fill="none"/>
                        
                        {{-- Left nodes --}}
                        <rect x="10" y="40" width="40" height="40" rx="8" fill="white" stroke="#6366F1" stroke-width="2"/>
                        <circle cx="30" cy="55" r="8" fill="#6366F1"/>
                        <path d="M18 68 Q30 65 42 68" stroke="#6366F1" stroke-width="2" fill="none"/>
                        
                        {{-- Center large node --}}
                        <rect x="70" y="50" width="60" height="60" rx="12" fill="#6366F1"/>
                        <circle cx="100" cy="80" r="20" fill="white"/>
                        
                        {{-- Right nodes --}}
                        <rect x="150" y="40" width="40" height="40" rx="8" fill="white" stroke="#6366F1" stroke-width="2"/>
                        <circle cx="170" cy="55" r="8" fill="#6366F1"/>
                        <path d="M158 68 Q170 65 182 68" stroke="#6366F1" stroke-width="2" fill="none"/>
                        
                        {{-- Dashed lines --}}
                        <line x1="50" y1="60" x2="70" y2="75" stroke="#A5B4FC" stroke-width="2" stroke-dasharray="4 4"/>
                        <line x1="100" y1="50" x2="100" y2="50" stroke="#A5B4FC" stroke-width="2" stroke-dasharray="4 4"/>
                        <line x1="150" y1="60" x2="130" y2="75" stroke="#A5B4FC" stroke-width="2" stroke-dasharray="4 4"/>
                    </svg>
                </div>
            </div>

            {{-- Right Card - Network Illustration with Photo --}}
            <div class="bg-gradient-to-br from-purple-50 to-indigo-50 rounded-2xl p-8 border border-purple-100">
                {{-- Network with center photo --}}
                <div class="relative w-full mb-6" style="height: 280px;">
                    <svg class="w-full h-full" viewBox="0 0 280 280" fill="none">
                        {{-- Dashed connection lines --}}
                        <line x1="140" y1="140" x2="140" y2="40" stroke="#A5B4FC" stroke-width="2" stroke-dasharray="4 4"/>
                        <line x1="140" y1="140" x2="200" y2="70" stroke="#A5B4FC" stroke-width="2" stroke-dasharray="4 4"/>
                        <line x1="140" y1="140" x2="230" y2="140" stroke="#A5B4FC" stroke-width="2" stroke-dasharray="4 4"/>
                        <line x1="140" y1="140" x2="200" y2="210" stroke="#A5B4FC" stroke-width="2" stroke-dasharray="4 4"/>
                        <line x1="140" y1="140" x2="140" y2="240" stroke="#A5B4FC" stroke-width="2" stroke-dasharray="4 4"/>
                        <line x1="140" y1="140" x2="80" y2="210" stroke="#A5B4FC" stroke-width="2" stroke-dasharray="4 4"/>
                        <line x1="140" y1="140" x2="50" y2="140" stroke="#A5B4FC" stroke-width="2" stroke-dasharray="4 4"/>
                        <line x1="140" y1="140" x2="80" y2="70" stroke="#A5B4FC" stroke-width="2" stroke-dasharray="4 4"/>
                        
                        {{-- Center large circle (photo) --}}
                        <circle cx="140" cy="140" r="50" fill="white" stroke="#6366F1" stroke-width="4"/>
                        <circle cx="140" cy="140" r="45" fill="#6366F1" opacity="0.2"/>
                        <image href="https://via.placeholder.com/90" x="95" y="95" width="90" height="90" clip-path="circle(45px at 50% 50%)"/>
                        
                        {{-- Top node --}}
                        <rect x="120" y="20" width="40" height="40" rx="8" fill="white" stroke="#6366F1" stroke-width="2"/>
                        <circle cx="140" cy="35" r="8" fill="#6366F1"/>
                        <path d="M128 48 Q140 45 152 48" stroke="#6366F1" stroke-width="1.5" fill="none"/>
                        
                        {{-- Top Right node --}}
                        <rect x="180" y="50" width="40" height="40" rx="8" fill="white" stroke="#6366F1" stroke-width="2"/>
                        <circle cx="200" cy="65" r="8" fill="#6366F1"/>
                        <path d="M188 78 Q200 75 212 78" stroke="#6366F1" stroke-width="1.5" fill="none"/>
                        
                        {{-- Right node --}}
                        <rect x="210" y="120" width="40" height="40" rx="8" fill="white" stroke="#6366F1" stroke-width="2"/>
                        <circle cx="230" cy="135" r="8" fill="#6366F1"/>
                        <path d="M218 148 Q230 145 242 148" stroke="#6366F1" stroke-width="1.5" fill="none"/>
                        
                        {{-- Bottom Right node --}}
                        <rect x="180" y="190" width="40" height="40" rx="8" fill="white" stroke="#6366F1" stroke-width="2"/>
                        <circle cx="200" cy="205" r="8" fill="#6366F1"/>
                        <path d="M188 218 Q200 215 212 218" stroke="#6366F1" stroke-width="1.5" fill="none"/>
                        
                        {{-- Bottom node --}}
                        <rect x="120" y="220" width="40" height="40" rx="8" fill="white" stroke="#6366F1" stroke-width="2"/>
                        <circle cx="140" cy="235" r="8" fill="#6366F1"/>
                        <path d="M128 248 Q140 245 152 248" stroke="#6366F1" stroke-width="1.5" fill="none"/>
                        
                        {{-- Bottom Left node --}}
                        <rect x="60" y="190" width="40" height="40" rx="8" fill="white" stroke="#6366F1" stroke-width="2"/>
                        <circle cx="80" cy="205" r="8" fill="#6366F1"/>
                        <path d="M68 218 Q80 215 92 218" stroke="#6366F1" stroke-width="1.5" fill="none"/>
                        
                        {{-- Left node --}}
                        <rect x="30" y="120" width="40" height="40" rx="8" fill="white" stroke="#6366F1" stroke-width="2"/>
                        <circle cx="50" cy="135" r="8" fill="#6366F1"/>
                        <path d="M38 148 Q50 145 62 148" stroke="#6366F1" stroke-width="1.5" fill="none"/>
                        
                        {{-- Top Left node --}}
                        <rect x="60" y="50" width="40" height="40" rx="8" fill="white" stroke="#6366F1" stroke-width="2"/>
                        <circle cx="80" cy="65" r="8" fill="#6366F1"/>
                        <path d="M68 78 Q80 75 92 78" stroke="#6366F1" stroke-width="1.5" fill="none"/>
                    </svg>
                </div>
                
                {{-- How does Connect work box --}}
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-bold text-gray-900 mb-2">How does Connect work?</h3>
                    <p class="text-sm text-gray-600">
                        We are stronger together — That is why we encourage our students to connect in between and help each other.
                    </p>
                </div>
            </div>
        </section>

        {{-- Post a request for help --}}
        <section class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-3">Post a request for help</h2>
            <p class="text-gray-600">
                Want to request help or offer your help to others? Create a post today! Create a request or offer by clicking here. You can connect with volunteers who are ready to jump into projects & collaborate.
            </p>
        </section>

        {{-- Are you a beginner seeking assistance? --}}
        <section class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-3">Are you a beginner seeking assistance?</h2>
            <p class="text-gray-600 mb-8">
                If you need guidance with job search, career direction, mentorship, or learning recommendations, browse below individuals who are currently open to answering questions.
            </p>

            {{-- Three Cards --}}
            <div class="grid md:grid-cols-3 gap-6">
                
                {{-- Card 1: Put your request for help --}}
                <div class="bg-white rounded-xl border border-gray-200 p-6 text-center">
                    <div class="w-14 h-14 bg-indigo-500 rounded-xl mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Put your request for help</h3>
                    <p class="text-sm text-gray-600">
                        If you need help with a skill, or don't know how to approach an issue, post your ask so other people could help you.
                    </p>
                </div>

                {{-- Card 2: Be patient and respectful --}}
                <div class="bg-white rounded-xl border border-gray-200 p-6 text-center">
                    <div class="w-14 h-14 bg-purple-500 rounded-xl mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Be patient and respectful</h3>
                    <p class="text-sm text-gray-600">
                        Mentors, like everyone else, are busy and have day-to-day responsibilities, so keep in mind you may need to accommodate to a schedule that works best for them.
                    </p>
                </div>

                {{-- Card 3: Give back to the community --}}
                <div class="bg-white rounded-xl border border-gray-200 p-6 text-center">
                    <div class="w-14 h-14 bg-blue-500 rounded-xl mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Give back to the community</h3>
                    <p class="text-sm text-gray-600">
                        Once you grow a skill, give back to others who are going through the same challenge as you were.
                    </p>
                </div>

            </div>
        </section>

        {{-- All requests --}}
        <section>
            <h2 class="text-2xl font-bold text-gray-900 mb-6">All requests</h2>
            
            {{-- Filter Buttons --}}
            <div class="flex gap-3 mb-6">
                <button class="px-5 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50">
                    New
                </button>
                <button class="px-5 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50">
                    Newest
                </button>
            </div>

            {{-- Request Cards Grid --}}
            <div class="grid md:grid-cols-2 gap-6">
                
                {{-- Request Card 1 --}}
                <article class="bg-white rounded-xl border border-gray-200 p-5">
                    <div class="flex items-start gap-3 mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-indigo-400 to-purple-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-semibold text-sm">JW</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2 mb-1">
                                <h3 class="font-semibold text-gray-900 text-sm">James White</h3>
                                <svg class="w-4 h-4 text-indigo-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-3 text-base">SEO expert ready to help small newcomers!</h4>
                    <div class="flex items-center gap-4">
                        <span class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-md text-xs font-medium">
                            Offer
                        </span>
                        <div class="flex items-center gap-3 text-sm text-gray-500">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                                0
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                                3
                            </span>
                        </div>
                    </div>
                </article>

                {{-- Request Card 2 --}}
                <article class="bg-white rounded-xl border border-gray-200 p-5">
                    <div class="flex items-start gap-3 mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-pink-400 to-rose-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-semibold text-sm">JC</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2 mb-1">
                                <h3 class="font-semibold text-gray-900 text-sm">Jason Carter</h3>
                                <svg class="w-4 h-4 text-indigo-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-3 text-base">Content marketing guru happy to help organize!</h4>
                    <div class="flex items-center gap-4">
                        <span class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-md text-xs font-medium">
                            Offer
                        </span>
                        <div class="flex items-center gap-3 text-sm text-gray-500">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                                0
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                                3
                            </span>
                        </div>
                    </div>
                </article>

                {{-- Request Card 3 --}}
                <article class="bg-white rounded-xl border border-gray-200 p-5">
                    <div class="flex items-start gap-3 mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-indigo-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-semibold text-sm">SC</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2 mb-1">
                                <h3 class="font-semibold text-gray-900 text-sm">Susan Claire</h3>
                                <svg class="w-4 h-4 text-indigo-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-3 text-base">Expert in marketing automation - here to help!</h4>
                    <div class="flex items-center gap-4">
                        <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-md text-xs font-medium">
                            Needed
                        </span>
                        <div class="flex items-center gap-3 text-sm text-gray-500">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                                3
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                                1
                            </span>
                        </div>
                    </div>
                </article>

                {{-- Request Card 4 --}}
                <article class="bg-white rounded-xl border border-gray-200 p-5">
                    <div class="flex items-start gap-3 mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-semibold text-sm">DW</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2 mb-1">
                                <h3 class="font-semibold text-gray-900 text-sm">David Wilson</h3>
                                <svg class="w-4 h-4 text-indigo-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-3 text-base">Instagram marketing assistance needed</h4>
                    <div class="flex items-center gap-4">
                        <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-md text-xs font-medium">
                            Request
                        </span>
                        <div class="flex items-center gap-3 text-sm text-gray-500">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                                0
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                                0
                            </span>
                        </div>
                    </div>
                </article>

                {{-- Request Card 5 --}}
                <article class="bg-white rounded-xl border border-gray-200 p-5">
                    <div class="flex items-start gap-3 mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-red-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-semibold text-sm">LB</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2 mb-1">
                                <h3 class="font-semibold text-gray-900 text-sm">Lisa Brown</h3>
                                <svg class="w-4 h-4 text-indigo-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-3 text-base">Help needed with content marketing</h4>
                    <div class="flex items-center gap-4">
                        <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-md text-xs font-medium">
                            Request
                        </span>
                        <div class="flex items-center gap-3 text-sm text-gray-500">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                                0
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                                0
                            </span>
                        </div>
                    </div>
                </article>

                {{-- Request Card 6 --}}
                <article class="bg-white rounded-xl border border-gray-200 p-5">
                    <div class="flex items-start gap-3 mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-teal-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-semibold text-sm">DA</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2 mb-1">
                                <h3 class="font-semibold text-gray-900 text-sm">David Anderson</h3>
                                <svg class="w-4 h-4 text-indigo-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-3 text-base">Newbie marketer needs SEO advice</h4>
                    <div class="flex items-center gap-4">
                        <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-md text-xs font-medium">
                            Request
                        </span>
                        <div class="flex items-center gap-3 text-sm text-gray-500">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                                1
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                                0
                            </span>
                        </div>
                    </div>
                </article>

            </div>
        </section>

    </main>
</x-layouts.app>
