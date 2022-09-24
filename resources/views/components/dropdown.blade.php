@props(['align' => 'right', 'width' => 'w-56'])

<div x-data="dropdown" class="group relative w-auto max-w-max" @mouseover.away="dropdownOpen = false">
    <div class="cursor-pointer flex items-center space-x-2" @click="dropdownOpen = !dropdownOpen">
        {!! $trigger !!}
    </div>

    <div
        x-show="dropdownOpen"
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-2"
        class="absolute z-10 top-10 pt-2 {{ $width }} {{ $align === 'right' ? 'right-0' : 'left-0' }}"
    >
        <div class=" rounded-md py-2 bg-white dark:bg-slate-800 border dark:border-white/5 shadow-sm flex flex-col">
            @isset($content)
                {!! $content !!}
            @endisset
        </div>
    </div>

</div>
