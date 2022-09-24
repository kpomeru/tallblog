<div class="h-16 md:h-20 flex items-center sticky top-0 inset-x-0 backdrop-blur bg-slate-100 dark:bg-slate-900/80 z-40 border-b dark:border-slate-100/10">
    <div class="flex items-center justify-between custom__container">
        <div>
            <x-logo></x-logo>
        </div>
        <div class="menu__list">
            <a class="menu__item @if(Route::currentRouteName() === 'home') active @endif" href="/" title="Go to homepage">
                <span>Home</span>
            </a>
            <a class="menu__item @if(Route::currentRouteName() === 'categories') active @endif" href="#">Categories</a>

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
                <x-dropdown>
                    <x-slot:trigger>
                        <div class="rounded-full p-1 pr-3 flex items-center space-x-2 bg-brand-100 hover:bg-white dark:bg-slate-800 dark:hover:bg-slate-700 h-10">
                            <x-avatar class="w-8 rounded-full"></x-avatar>
                            <span class="font-medium">
                                {{ auth()->user()->username }}
                            </span>
                        </div>
                    </x-slot:trigger>

                    <x-slot:content>
                        <a class="text-sm block px-3 md:px-4 py-2" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="Come back soon">Log out</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </x-slot:content>
                </x-dropdown>
            @endauth
        </div>
    </div>
</div>
