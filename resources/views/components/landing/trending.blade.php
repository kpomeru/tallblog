@props(['trendingPostsKey', 'post'])

<a class="bg-white dark:bg-slate-800 px-2.5 sm:px-4 md:px-6 py-6 lg:py-8 flex items-center space-x-4 group border dark:border-slate-700" href="{{ route('post', ['post' => $post]) }}" title="View post">
    <span class="flex items-center">
        <x-posts.likes :count="$post->likes_count" />
    </span>
    <span class="font-medium group-hover:text-brand-400">
        {{ $post->title }}
    </span>
</a>
