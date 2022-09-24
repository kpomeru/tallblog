@php
    $avatar = auth()->user()->avatar
@endphp

<img {{ $attributes->merge(['src' => auth()->user()->avatar, 'class' => 'w-full h-auto', 'alt' => auth()->user()->username . ' avatar' ]) }}>
