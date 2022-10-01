<?php

namespace App\Http\Livewire\Pages\Posts;

use App\Models\Post;
use Livewire\Component;

class PostPage extends Component
{
    public Post $post;

    public function render()
    {
        return view('livewire.pages.posts.post-page')->extends('layouts.app');
    }
}
