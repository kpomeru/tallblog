@props(['error' => false])

@php
    $style = "border-slate-300 placeholder-slate-400 focus:border-brand-300";

    if ($error) {
        $style = "border-rose-300 text-rose-700 placeholder-rose-300 focus:border-rose-300 focus:ring-rose";
    }
@endphp

<input {{ $attributes->merge([
        'type' => "text",
        'class' => "appearance-none block w-full px-3 sm:px-4 flex items-center h-10 border rounded-md focus:outline-none focus:ring-2 focus:ring-brand-300/50 transition duration-150 ease-in-out sm:text-sm sm:leading-5 {$style} bg-white dark:bg-slate-700 dark:border-transparent disabled:bg-slate-200 dark:disabled:bg-slate-800 disabled:cursor-not-allowed readonly:cursor-not-allowed"
    ]) }}
/>
