@props(['interestPostsKey', 'post'])

<div {{ $attributes->merge(['class' => "dark:text-slate-400 bg-white dark:bg-slate-800 hover:shadow-xl border border-transparent hover:border-brand-400 break-inside-avoid mb-4 sm:mb-6 overflow-hidden group"]) }}>
    @isset($post->image)
    <a class="group-hover:text-brand-400" href="{{ route('post', ['post' => $post]) }}" title="View post">
        <img src="{{ $post->image }}" class="bg-slate-500 w-full h-32 object-cover" alt="">
    </a>
    @endisset

    <div class="p-4 space-y-4">
        <div class="space-y-1">
            <h6 class="dark:text-white">
                <a class="group-hover:text-brand-400" href="{{ route('post', ['post' => $post]) }}" title="View post">
                    {{ $post->title }}
                </a>
            </h6>
            <div class="flex items-center space-x-2">
                <x-badge>
                    {{ $post->category->title }}
                </x-badge>
                <span class="text-sm">
                    {{ format_date($post->published_at, false, "M. jS Y") }}
                </span>
            </div>
        </div>
        <div class="truncate ...">
            {{ $post->excerpt }}
        </div>
    </div>
</div>
