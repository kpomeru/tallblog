<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'featured_post' => $this->get_featured_post(),
            'featured_posts' => $this->get_featured_posts(),
            'interest_posts' => $this->get_interests(),
            'recent_posts' => Post::whereNotNull('published_at')->with(['category', 'user'])->orderBy('published_at', 'desc')->limit(6)->get(),
            'trending_posts' => Post::withCount(['likes'])->get()->sortByDesc('likes_count')->take(10)->all()
            // ->sortByDesc(function ($q) {
            //     return $q->likes->count();
            // })->take(10)->all()
        ]);
    }

    private function get_preferred_category_ids()
    {
        return auth()->check() ? auth()->user()->categories->pluck('id') : [];
    }

    private function get_preferred_subscription_ids()
    {
        return auth()->check() ? auth()->user()->subscriptions->pluck('id') : [];
    }

    public function get_featured_post()
    {
        return Post::whereNotNull('image')->whereNotNull('published_at')->whereNotNull('featured_at')->with(['category', 'user'])->orderby('featured_at', 'desc')->first();
    }

    public function get_featured_posts()
    {
        return Post::whereNull('image')->whereNotNull('published_at')->whereNotNull('featured_at')->with(['category', 'user'])->orderby('featured_at', 'desc')->limit(2)->get();
    }

    public function get_interests()
    {
        $category_list = $this->get_preferred_category_ids();
        $subscribed_list = $this->get_preferred_subscription_ids();

        $query = Post::whereNotNull('published_at')
            ->when(auth()->check() && (count($category_list) || count($subscribed_list)), function ($q) use ($category_list, $subscribed_list) {
                $q->where(function ($q) use ($category_list, $subscribed_list) {
                    $q->whereIn('category_id', $category_list)
                        ->orWhereIn('user_id', $subscribed_list);
                });
            });

        return $query->with(['category', 'user'])->inRandomOrder()->orderBy('published_at', 'desc')->limit(6)->get();
    }
}
