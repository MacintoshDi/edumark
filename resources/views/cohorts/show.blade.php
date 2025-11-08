<x-layouts.app :main-menu="$mainMenu" :device="$device">
    <section class="cohort-header">
        <h1>{{ $cohort->name }}</h1>
        <p>{{ $cohort->description }}</p>
        <div class="cohort-meta">
            <span class="cohort-meta__badge" style="background-color: {{ $cohort->color }}"></span>
            <span>Старт: {{ optional($cohort->start_date)->translatedFormat('d F Y') }}</span>
        </div>
    </section>
    <section class="cohort-resources">
        <h2>Ресурсы</h2>
        <ul>
            @foreach ($cohort->resources as $resource)
                <li>
                    <strong>{{ $resource->title }}</strong>
                    <span>{{ $resource->type }}</span>
                </li>
            @endforeach
        </ul>
    </section>
    <section class="cohort-assignments">
        <h2>Задания</h2>
        <ul>
            @foreach ($cohort->assignments as $assignment)
                <li>
                    <strong>{{ $assignment->title }}</strong>
                    <span>{{ optional($assignment->due_date)->translatedFormat('d F Y H:i') }}</span>
                </li>
            @endforeach
        </ul>
    </section>
    <section class="cohort-discussions">
        <h2>Обсуждения</h2>
        @foreach ($cohort->discussions as $discussion)
            <article class="discussion">
                <h3>{{ $discussion->title }}</h3>
                <p>{{ \Illuminate\Support\Str::limit(strip_tags($discussion->content), 140) }}</p>
                <p class="discussion__meta">
                    Ответов: {{ $discussion->replies->count() }}
                </p>
            </article>
        @endforeach
    </section>
    <section class="cohort-events">
        <h2>События</h2>
        <ul>
            @foreach ($cohort->events as $event)
                <li>
                    <strong>{{ $event->title }}</strong>
                    <span>{{ $event->starts_at->translatedFormat('d F Y H:i') }}</span>
                </li>
            @endforeach
        </ul>
    </section>
</x-layouts.app>