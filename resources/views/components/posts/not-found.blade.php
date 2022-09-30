@props(['title'])

<div class="round-md bg-white dark:bg-slate-800 p-6 md:p-8 lg:p-10 lg:py-16 space-y-6 flex flex-col items-center justify-center rounded-md shadow-2xl shadow-slate-200 dark:shadow-none"
>
    <img src="{{ asset('images/no-results.png') }}" class="w-12 h-auto" alt="No results">
    <h4>
        <span class="text-slate-500">No post found.</span>
    </h4>
</div>
