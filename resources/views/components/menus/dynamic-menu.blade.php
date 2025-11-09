{{-- resources/views/components/menus/dynamic-menu.blade.php --}}
@props([
    'items' => [],
    'device' => 'desktop',
])

@php
    $device = is_string($device) ? trim($device) : 'desktop';
    $items = is_array($items) ? $items : [];
@endphp

<ul {{ $attributes->merge(['class' => 'menu menu--' . $device]) }}>
    @foreach ($items as $item)
        @php
            $type = $item['type'] ?? 'link';
            $url = $item['url'] ?? '#';
            $title = $item['title'] ?? '';
            $icon = $item['icon'] ?? null;
            $children = $item['children'] ?? [];
        @endphp

        <li class="menu__item menu__item--{{ e($type) }}">
            <a href="{{ $url }}" class="menu__link">
                @if (!empty($icon) && is_string($icon))
                    <x-dynamic-component :component="$icon" class="menu__icon" />
                @endif
                <span>{{ $title }}</span>
            </a>

            @if (!empty($children) && is_array($children))
                <x-menus.dynamic-menu :items="$children" :device="$device" class="menu__sub" />
            @endif
        </li>
    @endforeach
</ul>
