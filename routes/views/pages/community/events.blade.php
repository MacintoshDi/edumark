<x-layouts.app title="Events">
    <div class="mb-8">
        <div class="bg-white rounded-xl p-6 mb-6">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Events</h1>
            <p class="text-gray-600">Join one of our monthly events to share and learn knowledge about all things marketing</p>
        </div>

        <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl p-8 mb-6 text-center">
            <h2 class="text-2xl font-bold mb-2">Want to host a virtual or an in-person event?</h2>
            <p class="text-gray-600 mb-4">Contact us and let us know what you'd like to organize!</p>
            <a href="mailto:[email protected]" class="inline-flex items-center px-6 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 font-medium">
                Contact Us
            </a>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <article class="bg-white rounded-xl shadow-sm overflow-hidden">
                <img src="{{ asset('assets/images/event-placeholder.png') }}" alt="Event" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="inline-block px-3 py-1 bg-purple-100 text-purple-800 text-xs font-semibold rounded-full mb-2">Virtual</div>
                    <h3 class="text-xl font-bold mb-2">Monthly Marketing Meetup</h3>
                    <p class="text-gray-600 mb-4">Join us for our monthly discussion on latest marketing trends</p>
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Coming soon
                    </div>
                </div>
            </article>
        </div>
    </div>
</x-layouts.app>
