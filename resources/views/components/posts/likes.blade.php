@props(['count'])

<span {{ $attributes->merge(['class' => 'flex cursor-pointer items-center justify-center p-1 relative']) }}>
    <span
        class="absolute -top-0.5 -right-0.5 rounded h-3.5 p-0.5 px-1 text-[8px] flex items-center justify-center font-semibold shrink-0 bg-slate-800 dark:bg-white text-white dark:text-slate-700 pointer-events-none tracking-tighter">
        {{ $count }}
    </span>
    <x-heroicon-o-hand-raised />
</span>
