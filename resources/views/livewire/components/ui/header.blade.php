<div class="h-16 md:h-20 flex items-center sticky top-0 inset-x-0 backdrop-blur bg-slate-100 dark:bg-slate-900/80 z-40 border-b dark:border-slate-100/10">
    <div class="flex items-center justify-between custom__container">
        <div>
            <a href="{{ route('home') }}" title="Homepage">
                <x-logo></x-logo>
            </a>
        </div>
        <div class="menu__list">
            {{-- <a class="menu__item @if(Route::currentRouteName() === 'home') active @endif" href="/" title="Go to homepage">
                <span>Home</span>
            </a> --}}

            <x-categories />

            @guest
                @if (Route::has('login'))
                <a class="menu__item @if(Route::currentRouteName() === 'login') active @endif" href="{{ route('login') }}" title="Login to your account to contribute">Login</a>
                @endif

                @if (Route::has('register'))
                    <a class="menu__item @if(Route::currentRouteName() === 'register') active @endif" href="{{ route('register') }}" title="Join the tallblog community">Register</a>
                @endif
            @endif
        </div>
        <div class="flex space-x-2 items-center justify-end">
            <x-theme-switch :has-override="true" />
            @auth
                <x-header-user-menu />
            @endauth
        </div>
    </div>
</div>
