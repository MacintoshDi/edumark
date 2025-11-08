<ul {{ $attributes->class(['menu', 'menu--' . $device]) }}>
    @foreach ($items as $item)
        <li class="menu__item menu__item--{{ $item['type'] }}">
            <a href="{{ $item['url'] ?? '#' }}" class="menu__link">
                @if ($item['icon'])
                    <x-dynamic-component :component="$item['icon']" class="menu__icon" />
                @endif
                <span>{{ $item['title'] }}</span>
            </a>
            @if (!empty($item['children']))
                <x-menus.dynamic-menu :items="$item['children']" :device="$device" class="menu__submenu" />
            @endif
        </li>
    @endforeach
</ul>