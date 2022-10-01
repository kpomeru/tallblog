<?php

namespace App\Http\Livewire\Components\Posts;

use App\Models\Comment as Model;
use App\Models\Like;
use Livewire\Component;

class Comment extends Component
{
    /** @var object */
    public Model $comment;

    /** @var object */
    public Like $like;

    public function mount($id)
    {
        $this->set_info($id);
    }

    public function render()
    {
        return view('livewire.components.posts.comment');
    }

    public function like_unlike($vote)
    {
        if (!auth()->check()) {
            $this->enotify('Unauthenticated');
            return;
        }
        $vote = boolval($vote);

        if (!isset($this->like)) {
            $this->comment->likes()->create(['user_id' => auth()->id(), 'vote' => $vote]);
        } else {
            $this->like->update([
                'vote' => !$this->like->vote
            ]);
        }

        $this->set_info($this->comment->id);
    }

    public function set_info($id)
    {
        $this->comment = Model::whereId($id)->with(['user', 'likes'])->first();

        if (auth()->check()) {
            $like = $this->comment->likes()->whereUserId(auth()->id())->first();
            if ($like) {
                $this->like = $like;
            }
        }
    }
}
