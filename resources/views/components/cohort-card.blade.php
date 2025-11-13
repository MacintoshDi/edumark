@props(['cohort'])

<div class="bg-surface rounded-lg shadow-card overflow-hidden">
    <a href="{{ route('cohorts.show', ['slug' => $cohort['slug']]) }}">
        <img class="h-40 w-full object-cover" src="{{ asset('assets/images/' . $cohort['image']) }}" alt="{{ $cohort['name'] }}">
    </a>
    <div class="p-5">
        <a href="{{ route('cohorts.show', ['slug' => $cohort['slug']]) }}">
            <h3 class="font-bold text-lg text-copy">{{ $cohort['name'] }}</h3>
        </a>
        <p class="mt-1 text-sm text-copy-lightest">{{ $cohort['desc'] }}</p>
        <div class="mt-4 flex items-center gap-4 text-sm text-copy-light">
            <span>
                <strong class="text-copy">{{ $cohort['members'] }}</strong> members
            </span>
            <span>
                <strong class="text-copy">{{ $cohort['posts'] }}</strong> posts
            </span>
        </div>
        <div class="mt-5">
            <a href="{{ route('cohorts.show', ['slug' => $cohort['slug']]) }}" class="btn-primary w-full text-sm">View Cohort</a>
        </div>
    </div>
</div>
