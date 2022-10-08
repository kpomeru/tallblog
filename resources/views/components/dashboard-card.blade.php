@props(['count' => 0, 'item', 'routeName' => null])

<x-card class="group hover:shadow-xl border border-transparent dark:hover:border-brand-400 hover:shadow-indigo-100 dark:hover:shadow-none">
    <div class="space-x-4 flex items-center justify-between">
        <div>
            <h5 class="">
                <a class="flex items-center space-x-3" href="{{ isset($routeName) ? route($routeName) : '#' }}" title="View {{ $item }}">
                    <span class="capitalize">{{ $item }}</span>
                    @isset($routeName)
                    <x-heroicon-s-arrow-right class="md:opacity-0 md:group-hover:opacity-100 md:-translate-x-3 md:group-hover:translate-x-0" />
                    @endisset
                </a>
            </h5>
        </div>
        <div>
            <span class="text-5xl text-brand-400 dark:text-brand-300">
                <span>{{ $count }}</span>
            </span>
        </div>
    </div>
</x-card>
