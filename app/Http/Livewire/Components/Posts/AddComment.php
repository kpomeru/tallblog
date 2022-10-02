<?php

namespace App\Http\Livewire\Components\Posts;

use App\Models\Comment;
use App\Traits\SharedTrait;
use Livewire\Component;

class AddComment extends Component
{
    use SharedTrait;

    /** @var string */
    public $comment;

    /** @var string */
    public $post_id;

    public function mount($postId)
    {
        $this->post_id = $postId;
    }

    public function render()
    {
        return view('livewire.components.posts.add-comment');
    }

    public function create()
    {
        if (auth()->guest()) {
            return $this->redirect_guest();
        }

        $this->validate(['comment' => 'required|string|max:256']);

        Comment::create([
            'comment' => $this->comment,
            'post_id' => $this->post_id,
            'user_id' => auth()->id(),
        ]);

        $this->snotify('Comment added.');
        $this->emitUp('set_info', $this->post_id);
        $this->reset('comment');
    }
}
