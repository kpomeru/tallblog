@props(['count' => 0, 'error' => false,])

@php
    $style = "border-slate-300 placeholder-slate-400 focus:border-brand-300";

    if ($error) {
        $style = "border-rose-300 text-rose-700 placeholder-rose-300 focus:border-rose-300 focus:ring-rose";
    }
@endphp

<div class="relative">
    <textarea {{ $attributes->merge([
        'type' => "text",
        'class' => "appearance-none block w-full px-3 sm:px-4 py-3 pb-6 flex items-center border rounded-md focus:outline-none focus:ring-2 focus:ring-brand-300/50 transition duration-150 ease-in-out sm:text-sm sm:leading-5 {$style} bg-white dark:bg-slate-700 dark:border-transparent dark:disabled:border-slate-700 disabled:bg-slate-200 dark:disabled:bg-slate-800 disabled:cursor-not-allowed readonly:cursor-not-allowed min-h-[96px] max-h-40 relative"
    ]) }}>
    </textarea>
    @if ($attributes['maxlength'])
        <span class="text-xs leading-none py-px px-1 bg-white inline-flex items-center absolute right-0.5 bottom-0.5 text-slate-500">
            <span>{{ $count }}</span>
            <span>/</span>
            <span>{{ $attributes['maxlength'] }}</span>
        </span>
    @endif
</div>
