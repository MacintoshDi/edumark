@props(['slug' => 'main-menu'])

@php
    $menuController = new \App\Http\Controllers\MenuController();
    $menu = $menuController->getMenu($slug);
@endphp

@if($menu && $menu->items->count() > 0)
    <nav class="main-menu">
        <ul class="menu-list">
            @foreach($menu->items as $item)
                <li class="menu-item {{ $item->children->count() > 0 ? 'has-children' : '' }}">
                    <a href="{{ $item->url }}" 
                       @if($item->open_in_new_tab) target="_blank" @endif
                       class="menu-link">
                        {{ $item->label }}
                    </a>
                    
                    @if($item->children->count() > 0)
                        <ul class="submenu">
                            @foreach($item->children as $child)
                                <li class="submenu-item">
                                    <a href="{{ $child->url }}" 
                                       @if($child->open_in_new_tab) target="_blank" @endif
                                       class="submenu-link">
                                        {{ $child->label }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </nav>
@endif