@props(['category'])

<a class="px-4 py-3 rounded-md hover:bg-slate-100 dark:hover:bg-slate-900/40 flex items-center space-x-4 group" href="#">
    <span class="w-12 h-12 rounded-md bg-white group-hover:bg-brand-100/50 dark:group-hover:bg-brand-200 flex items-center justify-center p-2.5">
        <img src="{{ asset('images/categories/'.$category->slug.'.gif') }}" class="rounded-md bg-white w-auto" alt="">
    </span>
    <h5 class="capitalize">
        {{ $category->title }}
    </h5>
</a>
