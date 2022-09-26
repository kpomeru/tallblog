@props([
    'tableHeadClass' => 'bg-brand-400 dark:bg-slate-800 text-white',
    'hasBodyDivider' => true,
    'divider' => 'divide-y divide-slate-200 dark:divide-white/5'
])

@php
    $divider = $hasBodyDivider ? $divider : '';
@endphp

<div class="align-middle min-w-full overflow-x-auto overflow-hidden sm:rounded-md scrollbar__inverted shadow-sm dark:shadow-none">
    <table {{ $attributes->merge(['class' => 'min-w-full']) }}>
        <thead class="{{ $tableHeadClass }}">
            <tr>
                {{ $head }}
            </tr>
        </thead>

        <tbody class="bg-white dark:bg-slate-700 {{ $divider }}">
            {{ $body }}
        </tbody>
    </table>
</div>
