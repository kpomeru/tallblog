<div class="h-16 md:h-20 flex items-center sticky top-0 inset-x-0 backdrop-blur bg-slate-100 dark:bg-slate-900/75 z-40 border-b dark:border-slate-100/10">
    <div class="flex items-center justify-between custom__container">
        <div>
            <x-logo></x-logo>
        </div>
        <div class="menu__list">
            <a class="menu__item @if(Route::currentRouteName() === 'home') active @endif" href="/" title="Go to homepage">
                <span>Home</span>
            </a>
            <a class="menu__item @if(Route::currentRouteName() === 'categories') active @endif" href="#">Categories</a>

            @if (Route::has('login'))
            <a class="menu__item @if(Route::currentRouteName() === 'login') active @endif" href="{{ route('login') }}" title="Login to your account to contribute">Login</a>
            @endif

            @if (Route::has('register'))
                <a class="menu__item @if(Route::currentRouteName() === 'register') active @endif" href="{{ route('register') }}" title="Join the tallblog community">Register</a>
            @endif
        </div>
        <div>
            <x-button.icon color="light" title="Toggle site theme" @click="themeDataToggleIsDark">
                <template x-if="isDark">
                    <i class="fas fa-sun"></i>
                </template>
                <template x-if="!isDark">
                    <i class="fas fa-moon"></i>
                </template>
            </x-button.icon>
        </div>
    </div>
</div>
