@props(['label' => 'post'])

<span {{ $attributes->merge(['class' => 'flex cursor-pointer items-center justify-center p-1 text-slate-300 dark:text-slate-500 hover:text-slate-700 dark:hover:text-white transition duration-50', 'title' => "Dislike this {$label}"]) }}>
    <x-heroicon-s-hand-thumb-down />
</span>
