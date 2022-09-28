@props(['current_step' => 1])

@php
    $step = 1;
    if (auth()->check()) {
        $step = auth()->user()->registration_progress;
    }
@endphp

@if ($step <= 3)

<div class="flex items-center justify-end space-x-2 md:w-2/3 ml-auto">
    <?php
        for($s = 1; $s <= 3; $s++) {
    ?>
        <span class="rounded-full h-1 w-1/2 {{ $step >= $s ? 'bg-brand-400 dark:bg-white' : 'bg-slate-400/75 dark:bg-black' }}"></span>
    <?php
        }
    ?>
    <span class="text-xs font-semibold shrink-0 grow-0">Step {{ $step }}/3</span>
</div>

@endif

