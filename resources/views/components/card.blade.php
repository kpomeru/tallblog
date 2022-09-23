<div {{ $attributes->merge(['class' => 'p-6 md:p-8 rounded-lg bg-white border']) }}>
    @isset($slot)
        {{ $slot }}
    @endisset
</div>
