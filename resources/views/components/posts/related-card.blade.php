@props(['post'])

<a
    class="space-y-4 p-4 overflow-hidden hover:shadow-2xl bg-white/50 dark:bg-slate-800/50 hover:bg-brand hover:text-white dark:hover:bg-brand dark:hover:text-white group transition ease-out duration-500 origin-bottom border-t hover:border-brand flex flex-col justify-between"
    href="{{ route('post', ['post' => $post->slug]) }}"
    title="View post"
>
    <img src="{{ $post->image }}" class="rounded-md bg-slate-500 h-48 object-cover" alt="">

    <h5>{{ $post->title }}</h5>

    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-2">
            <x-avatar class="rounded-full border-4 border-white dark:border-white/10 group-hover:border-brand-400 w-10" type="image" :user="$post->user"></x-avatar>
            <h5 class="">
                {{ $post->user->username }}
            </h5>
        </div>
        <span class="text-xs">
            {{ format_date($post->published_at, false, "M. dS Y") }}
        </span>
    </div>
</a>
