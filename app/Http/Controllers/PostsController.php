<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $category_list = $this->get_preferred_category_ids();
        $subscribed_list = $this->get_preferred_subscription_ids();

        return view('welcome', [
            'featured_post' => $this->get_featured_post(),
            'featured_posts' => $this->get_featured_posts()
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
        return Post::whereNotNull('image')->whereNotNull('published_at')->with(['user'])->orderby('featured_at', 'desc')->first();
    }

    public function get_featured_posts()
    {
        return Post::whereNull('image')->whereNotNull('published_at')->with(['user'])->orderby('featured_at', 'desc')->limit(2)->get();
    }
}
