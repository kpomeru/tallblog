@props(['color' => 'brand'])

<?php
    $style = "";
    switch ($color) {
        case 'light':
            $style = "bg-white dark:text-slate-800 hover:border hover:border-slate-200";
            break;

        case 'dark':
            $style = "bg-slate-800 text-white hover:bg-slate-700 active:bg-slate-700";
            break;

        default:
            $style = "bg-brand text-white hover:bg-brand-400 active:bg-brand-400 dark:bg-brand-400 dark:hover:bg-brand-300 dark:active:bg-brand-300";
            break;
    }
?>

<button {{ $attributes->merge(['type' => 'submit', 'class' => "inline-flex items-center justify-center space-x-2 h-10 px-4 rounded-md font-medium text-xs capitalize {$style} focus:ring focus:ring-offset-2 focus:outline-none ring-brand-200 dark:ring-brand-200/25 ring-offset-white dark:ring-offset-slate-900 disabled:opacity-25"]) }}>
    {{ $slot }}
</button>
