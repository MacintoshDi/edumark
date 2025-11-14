@props(['job'])

<li class="p-6 hover:bg-gray-50 transition-colors">
    <a href="{{ route('academy.career.show', ['id' => $job['id']]) }}" class="flex flex-col sm:flex-row items-start gap-4">
        <div class="w-12 h-12 rounded-lg bg-gray-100 flex items-center justify-center flex-shrink-0">
            @if($job['logo'])
                <img src="{{ asset('assets/images/' . $job['logo']) }}" alt="{{ $job['company'] }}" class="h-6 w-6 object-contain">
            @else
                 <svg class="w-6 h-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18h16.5a1.5 1.5 0 0 1 1.5 1.5v16.5a1.5 1.5 0 0 1-1.5 1.5H3.75A1.5 1.5 0 0 1 2.25 19.5V4.5A1.5 1.5 0 0 1 3.75 3Zm0 0h16.5M3.75 6h16.5" />
                </svg>
            @endif
        </div>
        <div class="flex-grow">
            <p class="font-semibold text-copy">{{ $job['title'] }}</p>
            <div class="mt-1 flex items-center gap-x-4 gap-y-1 text-sm text-copy-lightest flex-wrap">
                <span>{{ $job['company'] }}</span>
                <span class="text-gray-300">•</span>
                <span>{{ $job['location'] }}</span>
            </div>
        </div>
        <div class="mt-2 sm:mt-0">
            <span class="tag bg-primary-50 text-primary-800">{{ $job['type'] }}</span>
        </div>
    </a>
</li>