<div
    x-data="{
        setFocus() {
            document.getElementById('post-search-input').focus();
        }
    }"
    x-show="showSearch"
    x-transition:enter="transition ease-out duration-150"
    x-transition:enter-start="opacity-0 scale-50"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-50"
    class="absolute z-10 -inset-x-1 -inset-y-2 @if(auth()->check() && auth()->user()->can_post) -right-12 @endif p-4 pl-6 md:pl-8 bg-white dark:bg-slate-800 shadow-2xl shadow-indigo-200 dark:shadow-none rounded-md flex items-center justify-between space-x-4 origin-top"
    {{ $attributes }}
    x-init="() => {
        if (showSearch) {
            setFocus();
        }

        $watch('search', (value) => {
            if (value === ' ') {
                search = '';
                $nextTick(() => {
                    setFocus();
                });
            }
        })

        $watch('showSearch', (value) => {
            if (value) {
                $nextTick(() => {
                    setFocus();
                });
            }
        })
    }"
    @keyup.esc="showSearch = false"
    @click.away="showSearch = false"
>
    <input id="post-search-input" x-model.debounce.500ms="search" class="w-full border-none p-0 focus:ring-0 text-xl lg:text-2xl font-medium bg-transparent" type="text">
    <x-button.icon class="!border-none shrink-0" color="transparent" title="Close search" @click="search ? search = '' : showSearch = false">
        <x-heroicon-s-x-mark />
    </x-button.icon>
</div>
