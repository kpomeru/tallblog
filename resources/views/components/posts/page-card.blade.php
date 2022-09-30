@props(['post'])

<div class="space-y-4 p-4 rounded-md overflow-hidden hover:shadow-2xl bg-white/50 dark:bg-slate-800/50 hover:bg-brand hover:text-white dark:hover:bg-brand dark:hover:text-white group hover:scale-[1.025]">
    <a href="#" class="flex flex-col space-y-2">
        @isset($post->image)
            <img src="{{ $post->image }}" class="rounded-md" alt="">
        @endisset
        <h4>{{ $post->title }}</h4>
    </a>
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-2">
            <x-avatar class="rounded-full border-4 border-white dark:border-white/10 group-hover:border-brand-400 w-12" type="image" :user="$post->user"></x-avatar>
            <h5 class="">
                {{ $post->user->username }}
            </h5>
        </div>
        <span class="text-xs">
            @isset($post->published_at)
                {{ format_date($post->published_at, false) }}
            @else
                <x-badge class="error">
                    Unpublished
                </x-badge>
            @endisset
        </span>
    </div>
    <div class="text-slate-500 group-hover:text-slate-300">
        {{ $post->excerpt }}
    </div>
    <div class="flex items-center justify-between">
        <x-badge class="capitalize">
            {{ $post->category->title }}
        </x-badge>

        <a href="#" class="opacity-0 group-hover:opacity-100">
            <x-button.icon class="!border-none" color="transparent">
                <x-heroicon-s-arrow-right />
            </x-button.icon>
        </a>
    </div>
</div>
