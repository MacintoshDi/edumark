<header class="sticky top-0 z-20 border-b border-border-color bg-white/80 backdrop-blur-lg">
    <div class="mx-auto max-w-screen-2xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <!-- Hamburger button for mobile -->
            <div class="lg:hidden">
                <button id="hamburger-button" type="button" class="btn-icon">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 12h16m-7 6h7"></path></svg>
                </button>
            </div>
            
            <!-- Desktop Mega Menus -->
            <div class="hidden lg:flex items-center gap-6">
                 <button id="cohorts-menu-button" class="nav-link">
                    Cohorts
                    <svg class="h-4 w-4 transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" /></svg>
                </button>
                 <button id="community-menu-button" class="nav-link">
                    Community
                    <svg class="h-4 w-4 transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" /></svg>
                </button>
                <a href="{{ route('community.connect') }}" class="nav-link">Connect</a>
                <a href="{{ route('academy.ask-teacher') }}" class="nav-link">Ask Your Teacher</a>
            </div>

            <!-- Header right section -->
            <div class="flex items-center gap-4">
                <button type="button" id="desktop-search-button" class="btn-icon">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </button>
                <a href="{{ route('login') }}" class="btn-secondary hidden sm:inline-flex">Log in</a>

                <!-- Profile Dropdown -->
                <div class="relative">
                    <button type="button" class="flex items-center gap-2" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                        <img class="h-9 w-9 rounded-full object-cover" src="{{ asset('assets/images/avatars/jessica-harris.jpg') }}" alt="Jessica Harris">
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- MEGA MENUS CONTAINER (Desktop only) -->
    <div id="mega-menus-container" class="relative">
        <div id="cohorts-menu" class="absolute inset-x-0 bg-white shadow-lg hidden">
            <div class="mx-auto grid max-w-5xl grid-cols-2 gap-4 p-8">
                <a href="{{ route('cohorts.show', ['slug' => 'growth-marketing']) }}" class="flex items-start gap-3 rounded-lg p-3 transition-colors hover:bg-gray-50">
                    <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-md bg-primary-50 text-2xl font-bold text-primary-300">1</div>
                    <div>
                        <p class="font-semibold text-gray-800">Growth Marketing</p>
                        <p class="text-sm text-gray-500">Elevate your skills with cutting-edge strategies for unparalleled growth.</p>
                    </div>
                </a>
                <a href="{{ route('cohorts.show', ['slug' => 'advanced-seo']) }}" class="flex items-start gap-3 rounded-lg p-3 transition-colors hover:bg-gray-50">
                    <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-md bg-primary-50 text-2xl font-bold text-primary-300">2</div>
                    <div>
                        <p class="font-semibold text-gray-800">Advanced SEO</p>
                        <p class="text-sm text-gray-500">Master the art of SEO with expert techniques for top rankings.</p>
                    </div>
                </a>
                <a href="{{ route('cohorts.show', ['slug' => 'video-marketing']) }}" class="flex items-start gap-3 rounded-lg p-3 transition-colors hover:bg-gray-50">
                    <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-md bg-primary-50 text-2xl font-bold text-primary-300">3</div>
                    <div>
                        <p class="font-semibold text-gray-800">Video Marketing</p>
                        <p class="text-sm text-gray-500">Harness the power of video to engage, inspire, and convert.</p>
                    </div>
                </a>
                <a href="{{ route('cohorts.show', ['slug' => 'content-marketing']) }}" class="flex items-start gap-3 rounded-lg p-3 transition-colors hover:bg-gray-50">
                    <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-md bg-primary-50 text-2xl font-bold text-primary-300">4</div>
                    <div>
                        <p class="font-semibold text-gray-800">Content Marketing</p>
                        <p class="text-sm text-gray-500">Create compelling content that captivates audiences and drives results.</p>
                    </div>
                </a>
            </div>
        </div>
        <div id="community-menu" class="absolute inset-x-0 bg-white shadow-lg hidden">
            <div class="mx-auto grid max-w-5xl grid-cols-3 gap-4 p-8">
                <a href="{{ route('community.discussion') }}" class="flex flex-col rounded-lg p-4 transition-colors hover:bg-gray-50">
                    <p class="font-semibold text-gray-800">Discussion</p>
                    <p class="text-sm text-gray-500">Have questions or want to share resources? You're in the right place!</p>
                </a>
                 <a href="{{ route('community.events') }}" class="flex flex-col rounded-lg p-4 transition-colors hover:bg-gray-50">
                    <p class="font-semibold text-gray-800">Events</p>
                    <p class="text-sm text-gray-500">Join our monthly events to share and learn knowledge.</p>
                </a>
                 <a href="{{ route('community.spotlight') }}" class="flex flex-col rounded-lg p-4 transition-colors hover:bg-gray-50">
                    <p class="font-semibold text-gray-800">Spotlight</p>
                    <p class="text-sm text-gray-500">A big round of applause for our amazing colleagues!</p>
                </a>
            </div>
        </div>
    </div>
</header>
