@props(['post'])

<div
    class="space-y-4 p-4 rounded-md overflow-hidden hover:shadow-2xl bg-white/50 dark:bg-slate-800/50 hover:bg-brand hover:text-white dark:hover:bg-brand dark:hover:text-white group hover:scale-[1.025] transition ease-out duration-500 origin-bottom"
>
    <a href="{{ route('post', ['post' => $post->slug]) }}" class="flex flex-col space-y-2" title="View post">
        @isset($post->image)
            <img src="{{ $post->image }}" class="rounded-md bg-slate-500" alt="">
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
                {{ format_date($post->published_at, false, "M. dS Y") }}
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

        <div class="flex items-center justify-end space-x-2">
            <x-button.icon-link href="{{ route('edit.post', ['post' => $post]) }}" class="opacity-0 group-hover:opacity-100 !border-none" color="transparent" title="Edit post">
                <x-heroicon-s-pencil class="w-4" />
            </x-button.icon-link>

            <x-button.icon-link href="{{ route('post', ['post' => $post->slug]) }}" class="opacity-0 group-hover:opacity-100 !border-none" color="transparent" title="View post">
                <x-heroicon-s-arrow-right />
            </x-button.icon-link>
        </div>
    </div>
</div>
