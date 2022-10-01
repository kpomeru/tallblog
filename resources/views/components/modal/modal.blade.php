@props([
    'id',
    'maxWidth',
    'modalPlacement' => 'sm:items-top',
    'noPadding' => false,
])

@php
$id = $id ?? md5($attributes->wire('model'));

switch ($maxWidth ?? 'xl') {
    case 'sm':
        $maxWidth = 'sm:max-w-sm';
        break;

    case 'md':
        $maxWidth = 'sm:max-w-md';
        break;

    case 'lg':
        $maxWidth = 'sm:max-w-lg';
        break;

    case '2xl':
        $maxWidth = 'sm:max-w-2xl';
        break;

    case '3xl':
        $maxWidth = 'sm:max-w-3xl';
        break;

    case '4xl':
        $maxWidth = 'sm:max-w-3xl md:max-w-4xl';
        break;

    case '5xl':
        $maxWidth = 'sm:max-w-4xl md:max-w-5xl';
        break;

    case '6xl':
        $maxWidth = 'sm:max-w-4xl md:max-w-5xl  lg:max-w-6xl';
        break;

    case '7xl':
        $maxWidth = 'sm:max-w-4xl md:max-w-5xl  lg:max-w-6xl xl:max-w-7xl';
        break;

    case 'xl':
    default:
        $maxWidth = 'sm:max-w-xl';
        break;
}
@endphp

<div
    x-data="{
        show: @entangle($attributes->wire('model')),
        focusables() {
            let selector = 'a, button, input, textarea, select, details, [tabindex]:not([tabindex=\'-1\'])'

            return [...$el.querySelectorAll(selector)]
                .filter(el => ! el.hasAttribute('disabled'))
        },
        firstFocusable() { return this.focusables()[0] },
        lastFocusable() { return this.focusables().slice(-1)[0] },
        nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() },
        prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() },
        nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) },
        prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 },
        autofocus() { let focusable = $el.querySelector('[autofocus]'); if (focusable) focusable.focus() },
    }"
    x-init="$watch('show', value => value && setTimeout(autofocus, 50))"
    x-on:close.stop="show = false"
    x-on:keydown.escape.window="show = false"
    x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
    x-on:keydown.shift.tab.prevent="prevFocusable().focus()"
    x-show="show"
    x-trap.noscroll="show"
    id="{{ $id }}"
    class="fixed top-0 inset-x-0 px-4 pt-6 z-[91] sm:px-0 sm:flex {{ $modalPlacement }} sm:justify-center"
    style="display: none;"
>
    <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0">
        <div class="absolute inset-0 bg-slate-900/80"></div>
    </div>

    <div x-show="show" class="bg-white dark:bg-slate-800 rounded-lg overflow-y-auto shadow-xl transform transition-all sm:w-full {{ $maxWidth }}"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
        {{ $slot }}
    </div>
</div>
