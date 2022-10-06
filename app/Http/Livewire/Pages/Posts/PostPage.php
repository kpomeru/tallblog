<?php

namespace App\Http\Livewire\Pages\Posts;

use App\Models\Post;
use Livewire\Component;

class PostPage extends Component
{
    public Post $post;

    public function render()
    {
        return view('livewire.pages.posts.post-page', ['related_posts' => $this->related])->extends('layouts.app');
    }

    public function getRelatedProperty()
    {
        return Post::where('id', '<>', $this->post->id)
            ->whereCategoryId($this->post->category_id)
            ->whereNotNull('image')
            ->whereNotNull('published_at')
            ->limit(4)->get();
    }
}
