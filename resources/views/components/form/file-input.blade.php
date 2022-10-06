@props(['image', 'label' => 'Choose File', 'previousImage'])

<div class="space-y-2">
    <div class="flex items-center justify-between space-x-2">
        <div class="flex items-center space-x-2">
            @if (isset($image))
            <div class="shrink-0 w-12 h-12 bg-slate-200 dark:bg-slate-700 flex items-center justify-center rounded-md">
                <img src="{{ $image->temporaryUrl() }}" alt="New image">
            </div>
            @elseif (isset($previousImage))
            <div class="shrink-0 w-12 h-12 bg-slate-200 dark:bg-slate-700 flex items-center justify-center rounded-md">
                <img src="{{ $previousImage }}" alt="Previous image">
            </div>
            @endif

            <label class="block">
                <span class="sr-only cursor-pointer text-sm">{{ $label }}</span>
                <input
                    {{ $attributes->merge(['class' => "block w-full text-sm text-slate-500 file:mr-2 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-medium file:bg-slate-100 dark:file:bg-slate-700 file:text-slate-700 dark:file:text-white hover:file:bg-slate-200 dark:hover:file:bg-slate-600 focus:border-transparent dark:focus:border-transparent cursor-pointer disabled:pointer-events-none disabled:opacity-50 disabled:cursor-not-allowed", 'type' => 'file']) }}
                />
            </label>
        </div>

        @isset($clear)
            {{ $clear }}
        @endisset
    </div>

    @isset($progress)
        {{ $progress }}
    @endisset
</div>
