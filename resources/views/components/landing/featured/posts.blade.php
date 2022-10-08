@props(['featuredPostsKey', 'post'])

<div {{ $attributes->merge(['class' => "space-y-4 dark:text-slate-400 p-4 md:p-6"]) }}>
    <div class="flex items-center space-x-2 ">
        <x-badge>
            {{ $post->category->title }}
        </x-badge>
        <span class="text-sm">
            {{ format_date($post->published_at, false, "M. jS Y") }}
        </span>
    </div>
    <h5 class="dark:text-white">
        <a class="hover:text-brand-400" href="{{ route('post', ['post' => $post]) }}" title="View post">
            {{ $post->title }}
        </a>
    </h5>
    <div>
        {{ $post->excerpt }}
    </div>
    <div class="flex items-center space-x-2">
        <x-avatar
            class="rounded-full border-4 border-white dark:border-white/10 group-hover:border-brand-400 w-12"
            type="image" :user="$post->user"></x-avatar>
        <span class="font-medium">
            {{ $post->user->username }}
        </span>
    </div>
</div>
