@props(['error' => false])

@php
    $style = "border-slate-300 focus:border-brand-300";

    if ($error) {
        $style = "border-rose-300 focus:border-rose-300 focus:ring-rose";
    }
@endphp

<span class=" min-w-fit"></span>

<select  {!! $attributes->merge(['class' => "min-w-max text-sm rounded-md border focus:outline-none focus:ring-2 focus:ring-brand-300/50 pl-3 pr-2 h-10 {$style} readonly:cursor-not-allowed disabled:cursor-not-allowed bg-white dark:bg-slate-700 dark:border-transparent dark:disabled:border-slate-700 disabled:bg-slate-200 dark:disabled:bg-slate-800"]) !!}>
    {{ $slot }}
</select>
