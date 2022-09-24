@props(['error' => false])

@php
    $style = "border-slate-300 placeholder-slate-400 focus:border-brand-300";

    if ($error) {
        $style = "border-red-300 text-red-700 placeholder-red-300 focus:border-red-300 focus:ring-red";
    }
@endphp

<input {{ $attributes->merge([
        'type' => "text",
        'class' => "appearance-none block w-full px-3 sm:px-4 flex items-center h-10 border rounded-md focus:outline-none focus:ring-2 focus:ring-brand-300/50 transition duration-150 ease-in-out sm:text-sm sm:leading-5 {$style} dark:bg-slate-700 dark:border-transparent"
    ]) }}
/>
