@props(['type' => 'letter', 'user' => auth()->user()])

@php
    $avatar = $user->avatar($type);
@endphp

<img {{ $attributes->merge(['src' => $avatar, 'class' => 'w-full h-auto', 'alt' => $user->username . ' avatar' ]) }}>
