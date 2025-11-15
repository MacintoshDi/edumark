<x-layouts.app title="Careers">
    <div class="mb-8">
        <div class="bg-white rounded-xl p-6 mb-6">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Careers</h1>
            <p class="text-gray-600">Browse marketing job opportunities</p>
        </div>

        <div class="space-y-4">
            @for ($i = 1; $i <= 5; $i++)
            <article class="bg-white rounded-xl shadow-sm p-6 hover:shadow-lg transition-shadow">
                <div class="flex items-start justify-between">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-gray-200 rounded-lg"></div>
                        <div>
                            <h3 class="text-lg font-semibold mb-1">Marketing Manager</h3>
                            <p class="text-gray-600">Company Name</p>
                            <div class="flex items-center gap-4 mt-2 text-sm text-gray-500">
                                <span>📍 Remote</span>
                                <span>💼 Full-time</span>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 text-sm">
                        Apply
                    </a>
                </div>
            </article>
            @endfor
        </div>
    </div>
</x-layouts.app>
