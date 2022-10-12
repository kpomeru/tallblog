@extends('layouts.app')

@section('content')
    <div class="space-y-6 md:space-y-8 lg:space-y-12 py-6 md:py-8">
        <div class="space-y-3">
            <div class="custom__container">
                <h5 class="text-center sm:text-left">Featured Posts</h5>
            </div>
            <div class="custom__container p-0 sm:px-6">
                <x-landing.featured :featured-post="$featured_post" :featured-posts="$featured_posts"></x-landing.featured>
            </div>
        </div>

        <div class="custom__container space-y-3">
            @auth
                <h6>Post based on your preferences</h6>
            @endauth

            <div class="sm:columns-2 md:columns-3 gap-4 sm:gap-6">
                @foreach ($interest_posts as $interestPostsKey => $post)
                    <x-landing.interest :interest-post-key="$interestPostsKey" :post="$post" />
                @endforeach
            </div>
        </div>

        <div class="pt-6 space-y-4">
            <div class="px-4 md:px-6 lg:px-8 xl:px-12">
                <span class="font-semibold text-5xl sm:text-6xl md:text-7xl text-slate-300 dark:text-slate-700">Recent Posts</span>
            </div>
            @php
                $colors = [
                    'bg-indigo-500',
                    'bg-orange-500',
                    'bg-brand',
                    'bg-rose-500',
                    'bg-purple-700',
                    'bg-emerald-700',
                ];
                shuffle($colors);
            @endphp
            <div class="grid grid-cols-2 sm:grid-cols-3 z-10">
                @foreach ($recent_posts as $recentPostsKey => $post)
                    <x-landing.recent :post="$post" :color="$colors[$recentPostsKey]" :recent-posts-key="$recentPostsKey" />
                @endforeach
            </div>
        </div>

        <div class="custom__container space-y-3">
            <h5>Trending Posts</h5>
            <div class="grid grid-cols-2 gap-2 sm:gap-4 -mx-6 sm:m-0">
                @foreach ($trending_posts as $trendingPostsKey => $post)
                <x-landing.trending :post="$post" :trending-posts-key="$trendingPostsKey" />
                @endforeach
            </div>
        </div>
    </div>
@endsection
