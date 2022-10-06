@props(['disabled' => false])

@php
    $classes = $disabled ? 'pointer-events-none opacity-50 cursor-not-allowed' : 'cursor-pointer'
@endphp

<label {{ $attributes->merge(['class' => "block text-sm font-medium leading-5"]) }}>
    {{ $slot }}
</label>
