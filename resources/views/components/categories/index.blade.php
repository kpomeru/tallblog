<div
    x-data="{
        open: false,
        clicked: false,
    }"
    class="hidden md:inline-block"
>
    <span class="menu__item cursor-pointer" :class="{'text-brand-300': open}" @click="open = !open">
        <span>Categories</span>
        <span :class="{'rotate-180': open}">
            <x-heroicon-m-chevron-down  />
        </span>
    </span>

    <template x-teleport="body">
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 -translate-y-12 scale-90"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
            x-transition:leave-end="opacity-0 -translate-y-12 scale-90"
            class="fixed top-16 inset-x-0 z-40"
        >
            <div class="custom__container hidden md:grid bg-white dark:bg-slate-800 rounded-md p-6 shadow-lg shadow-indigo-100 dark:shadow-slate-900 grid-cols-2 lg:grid-cols-3 gap-4 origin-top-right" @click.away="open = false">
                @foreach ($headerCategories as $cat)
                <x-categories.category :category="$cat" />
                @endforeach
            </div>
        </div>
    </template>
</div>
