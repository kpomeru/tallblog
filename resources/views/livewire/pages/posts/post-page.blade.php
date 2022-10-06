@section('title', $post->title)

@php
// dd($post->getAttributes()['image']);
$date_format = "M. d";
$same_year = date('Y', strtotime($post->published_at)) === date('Y');

if (!$same_year) {
$date_format .= " Y";
}
@endphp

<div class="space-y-6 md:space-y-8 lg:space-y-10 pt-6">
    <div class="custom__container">
        <div class="max-w-screen-md mx-auto space-y-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <x-avatar
                        class="rounded-full border-2 border-white dark:border-white/10 group-hover:border-brand-400 w-16"
                        type="image" :user="$post->user"></x-avatar>
                    <div class="flex flex-col -space-y-1">
                        <h5 class="">
                            {{ $post->user->username }}
                        </h5>
                        <span class="text-sm">
                            @isset($post->published_at)
                            {{ format_date($post->published_at, false, $date_format) }}
                            @else
                            <x-badge class="error">
                                Unpublished
                            </x-badge>
                            @endisset
                        </span>
                    </div>
                </div>
                <div class="flex items-center justify-end space-x-2">
                    <livewire:components.posts.subscribe-to-author :author-id="$post->user->id" />
                    @if (auth()->check() && (auth()->user()->is_admin || auth()->id() === $post->user_id))
                    <x-button.icon-link class="shrink-0" href="{{ route('edit.post', ['post' => $post]) }}"
                        title="Edit/Update Post">
                        <x-heroicon-m-pencil class="w-4" />
                    </x-button.icon-link>
                    @if (auth()->id() === $post->user_id)
                    <livewire:components.posts.delete-post :post="$post" />
                    @endif
                    @endif
                </div>
            </div>

            <h2 class="text-brand-400">{{ $post->title }}</h2>

            <div class="flex flex-wrap items-center">
                <x-badge class="capitalize flip mr-1.5 mb-1.5 dark:flip">
                    {{ $post->category->title }}
                </x-badge>
                <span class="px-1 mr-1.5 mb-1.5">|</span>
                @if (isset($post->tags) && count($post->tags))
                @foreach ($post->tags as $tag)
                <x-badge class="capitalize mr-1.5 mb-1.5">
                    {{ $tag }}
                </x-badge>
                @endforeach
                @endif
            </div>
        </div>
    </div>

    @isset($post->image)
    <img src="{{ $post->image }}" class="w-5/6 h-64 sm:h-96 md:h-[480px] object-cover bg-white dark:bg-slate-800" alt="">
    @endisset

    <div class="custom__container">
        <div class="max-w-screen-md mx-auto space-y-6">
            <div
                class="rounded-md bg-white/50 dark:bg-slate-800/50 p-4 md:p-6 lg:p-8 text-lg md:text-xl -mx-6 border-y sm:m-0 sm:border-none">
                {{ $post->excerpt }}
            </div>

            <div class="content__styles py-6 mg:py-8 lg:py-10">
                {!! $post->content !!}
            </div>

            <livewire:components.posts.comments-likes :id="$post->id" />

            <div class="py-6 md:py-9 lg:py-12 xl:py-16 flex items-center justify-center">
                <div class="flex items-center space-x-6 mx-auto w-full sm:w-2/3 lg:1/2">
                    <x-avatar
                        class="rounded-full border-4 border-white dark:border-white/10 group-hover:border-brand-400 w-24"
                        type="image" :user="$post->user"></x-avatar>
                    <div class="flex flex-col">
                        <h6 class="">
                            {{ $post->user->username }}
                        </h6>
                        <p class="text-xs sm:text-sm text-slate-500">
                            {{ $post->user->bio }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="space-y-6">
        <h5 class="text-center text-slate-500">Related posts</h5>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 divide-x divide-y">
            @foreach ($related_posts as $related_post)
                <x-posts.related-card :post="$related_post" />
            @endforeach
        </div>
    </div>
</div>
