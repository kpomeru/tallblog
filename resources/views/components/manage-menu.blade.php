@php
    $manage_menu_list = [
        [
            'title' => 'dashboard',
            'route' => 'manage.dashboard'
        ],
        [
            'title' => 'categories',
            'route' => 'manage.categories'
        ],
        [
            'title' => 'users',
            'route' => 'manage.users'
        ]
    ]
@endphp

<div class="border-b dark:border-slate-700 flex items-center justify-center">
    @foreach ($manage_menu_list as $manage_menu)
        <a class="manage__menu__item @if(Route::currentRouteName() === $manage_menu['route']) active @endif" href="{{ route($manage_menu['route']) }}" title="Open {{ $manage_menu['title'] }} page">
            @if ($manage_menu['title'] === 'dashboard')
                <x-heroicon-s-computer-desktop class="w-4 h-4" />
            @elseif ($manage_menu['title'] === 'categories')
                <x-heroicon-s-rectangle-group class="w-4 h-4" />
            @else
                <x-heroicon-s-user-group class="w-4 h-4" />
            @endif

            <span>
                {{ $manage_menu['title'] }}
            </span>
        </a>
    @endforeach
</div>
