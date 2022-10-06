<?php

namespace App\Http\Livewire\Components\Posts;

use App\Models\Post;
use Livewire\Component;

class DeletePost extends Component
{
    /** @var bool */
    public $confirm_delete = false;

    /** @var object */
    public Post $post;

    public function render()
    {
        return view('livewire.components.posts.delete-post');
    }

    public function destroy()
    {
        if (auth()->id() !== $this->post->user_id) {
            $this->confirm_delete = false;
            $this->enotify('Unauthorized.');
        }

        $title = $this->post->title;
        $this->post->delete();
        session()->flash("success", "{$title} post deleted.");
        return redirect()->route('posts', ['authorPosts' => true]);
    }
}
