@section('title', $post->title)

@php
    $date_format = "M. d";
    $same_year = date('Y', strtotime($post->published_at)) === date('Y');

    if (!$same_year) {
        $date_format .= " Y";
    }
@endphp

<div class="space-y-6 md:space-y-8 lg:space-y-10 py-6">
    <div class="custom__container">
        <div class="max-w-screen-md mx-auto space-y-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <x-avatar class="rounded-full border-2 border-white dark:border-white/10 group-hover:border-brand-400 w-16" type="image" :user="$post->user"></x-avatar>
                    <div class="flex flex-col">
                        <h5 class="">
                            {{ $post->user->username }}
                        </h5>
                        <span class="text-sm font-medium">
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
                <livewire:components.posts.subscribe-to-author :author-id="$post->user->id" />
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
        <img src="{{ $post->image }}" class="w-5/6 h-64 sm:h-96 md:h-[480px] object-cover" alt="">
    @endisset

    <div class="custom__container">
        <div class="max-w-screen-md mx-auto space-y-6">
            <div class="rounded-md bg-white/50 dark:bg-slate-800/50 p-4 md:p-6 lg:p-8 text-lg md:text-xl lg:text-2xl -mx-6 border-y sm:m-0 sm:border-none">
                {{ $post->excerpt }}
            </div>

            <div>
                {!! $post->content !!}
            </div>

            <livewire:components.posts.comments-likes :id="$post->id" />

            <div class="py-6 md:py-9 lg:py-12 xl:py-16 flex items-center justify-center">
                <div class="flex items-center space-x-6 mx-auto w-full sm:w-2/3 lg:1/2">
                    <x-avatar class="rounded-full border-4 border-white dark:border-white/10 group-hover:border-brand-400 w-24" type="image" :user="$post->user"></x-avatar>
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

</div>
