@props(['event'])

<div class="bg-surface rounded-lg shadow-card overflow-hidden group">
    <img class="h-40 w-full object-cover" src="{{ asset('assets/images/' . $event['image']) }}" alt="{{ $event['title'] }}">
    <div class="p-5">
        <p class="text-sm font-semibold text-primary">{{ $event['type'] }} ・ {{ $event['date'] }}</p>
        <h3 class="mt-2 font-bold text-lg text-copy">{{ $event['title'] }}</h3>
        <div class="mt-4">
            <a href="#" class="btn-secondary w-full text-sm">View Details</a>
        </div>
    </div>
</div>