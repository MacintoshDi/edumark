@props(['student'])

<div class="bg-surface rounded-lg shadow-card text-center p-6 transition-transform hover:-translate-y-1">
    <a href="#">
        <img class="w-24 h-24 rounded-full mx-auto object-cover" src="{{ asset('assets/images/avatars/' . $student['avatar']) }}" alt="{{ $student['name'] }}">
    </a>
    <h3 class="mt-4 text-lg font-semibold text-copy">
        <a href="#" class="hover:text-primary">{{ $student['name'] }}</a>
    </h3>
    <p class="mt-1 text-sm text-copy-lightest">{{ $student['role'] }}</p>
    <div class="mt-4">
        <button class="btn-secondary w-full text-sm">View Profile</button>
    </div>
</div>