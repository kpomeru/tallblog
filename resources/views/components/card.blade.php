<div {{ $attributes->merge(['class' => 'p-6 md:p-8 rounded-lg bg-white dark:bg-slate-800 border dark:border-transparent']) }}>
    @isset($slot)
        {{ $slot }}
    @endisset
</div>
