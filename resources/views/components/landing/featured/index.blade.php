@props(['featuredPost', 'featuredPosts'])

<div class="bg-white dark:bg-slate-800">
    <div class="p-4 md:p-6 border border-b-0 dark:border-slate-700 grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
        <div class="md:col-span-2">
            <a class="hover:text-brand-400" href="{{ route('post', ['post' => $featuredPost]) }}" title="View post">
                <img src="{{ $featuredPost->image }}" class="rounded-md object-cover h-full" alt="{{ $featuredPost->title }} image">
            </a>
        </div>
        <div class="space-y-4 dark:text-slate-400 self-center">
            <div class="flex items-center space-x-2 ">
                <x-badge>
                    {{ $featuredPost->category->title }}
                </x-badge>
                <span class="text-sm">
                    {{ format_date($featuredPost->published_at, false, "M. jS Y") }}
                </span>
            </div>
            <h3 class="dark:text-white">
                <a class="hover:text-brand-400" href="{{ route('post', ['post' => $featuredPost]) }}" title="View post">
                    {{ $featuredPost->title }}
                </a>
            </h3>
            <div>
                {{ $featuredPost->excerpt }}
            </div>
            <div class="flex items-center space-x-2">
                <x-avatar
                    class="rounded-full border-4 border-white dark:border-white/10 group-hover:border-brand-400 w-12"
                    type="image" :user="$featuredPost->user"></x-avatar>
                <span class="font-medium">
                    {{ $featuredPost->user->username }}
                </span>
            </div>
        </div>
    </div>
    <div class="border dark:border-slate-700 flex flex-col sm:flex-row divide-y md:divide-y-0 sm:divide-x dark:divide-slate-700">
        @foreach ($featuredPosts as $featuredPostsKey => $post)
            <x-landing.featured.posts :featured-post-key="$featuredPostsKey" :post="$post" />
        @endforeach
    </div>
</div>
