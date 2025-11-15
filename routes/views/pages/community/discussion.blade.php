<x-layouts.app title="Discussion">
    <div class="mb-8">
        <div class="bg-white rounded-xl p-6 mb-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center">
                    <svg class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Discussion</h1>
                    <p class="text-gray-600">Have questions, feedback requests, or want to share marketing resources?</p>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl p-8 mb-6 text-center">
            <h2 class="text-2xl font-bold mb-2">Looking to connect with other students?</h2>
            <p class="text-gray-600 mb-4">If you would like to connect in a more direct way with your fellow students, we invite you to go to the Connect page.</p>
            <a href="{{ route('community.connect') }}" class="inline-flex items-center px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-medium">
                Go to Connect
            </a>
        </div>

        <div class="grid gap-6">
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-semibold mb-2">Featured Discussions</h3>
                <div class="space-y-4">
                    <div class="border-b pb-4">
                        <div class="flex items-start gap-4">
                            <img src="{{ asset('assets/images/avatars/daniel-wilson.jpg') }}" alt="User" class="w-10 h-10 rounded-full">
                            <div class="flex-1">
                                <h4 class="font-semibold">What's the future of influencer marketing?</h4>
                                <p class="text-sm text-gray-600">Posted 2 days ago by Daniel Wilson</p>
                                <div class="flex items-center gap-4 mt-2 text-sm text-gray-500">
                                    <span>👍 12</span>
                                    <span>💬 8 comments</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
