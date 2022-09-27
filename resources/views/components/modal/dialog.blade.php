@props(['id' => null, 'maxWidth' => null, 'maxHeight' => null, 'styleHeight' => null, 'noPadding' => false])

@php
    $maxHeight = $maxHeight ? "{$maxHeight}" : null;
@endphp

<x-modal.modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="{{ $noPadding ? '' : 'p-6' }}">
        @if (isset($title))
            <div class="flex items-center space-x-2">
                {{ $title }}
            </div>
        @endif

        <div class="{{ $noPadding ? '' : (isset($title) ? 'mt-4 lg:mt-6' : '') }} space-y-6 {{ $maxHeight }} {{ $maxHeight || $styleHeight ? 'overflow-y-auto' : '' }}" style='{{ $styleHeight ? "max-height: {$styleHeight};" : "" }}'>
            {{ $content }}
        </div>
    </div>

    @if (isset($footer))
        <div class="px-6 py-4 bg-slate-100 dark:bg-slate-700/25 flex items-center justify-end space-x-4">
            {{ $footer }}
        </div>
    @endif
</x-modal.modal>
