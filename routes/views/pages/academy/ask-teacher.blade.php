<x-layouts.app title="Ask Your Teacher">
    <div class="mb-8">
        <div class="bg-white rounded-xl p-6 mb-6">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Ask Your Teacher</h1>
            <p class="text-gray-600">Get help from our expert instructors</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @for ($i = 1; $i <= 6; $i++)
            <article class="bg-white rounded-xl shadow-sm p-6">
                <img src="{{ asset('assets/images/avatars/daniel-wilson.jpg') }}" alt="Teacher" class="w-20 h-20 rounded-full mx-auto mb-4">
                <h3 class="text-lg font-semibold text-center mb-1">Teacher Name</h3>
                <p class="text-sm text-gray-600 text-center mb-4">Marketing Expert</p>
                <button class="w-full px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 text-sm font-medium">
                    Ask a Question
                </button>
            </article>
            @endfor
        </div>
    </div>
</x-layouts.app>
