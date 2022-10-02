<?php

namespace App\Http\Livewire\Components\Posts;

use App\Models\Comment as Model;
use App\Models\Like;
use Livewire\Component;

class Comment extends Component
{
    /** @var bool */
    public $confirm_delete = false;

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
        return view('livewire.components.posts.comment', ['can_delete' => $this->can_delete]);
    }

    public function destroy()
    {
        if (!$this->can_delete) {
            $this->confirm_delete = false;
            $this->enotify('Unauthorized.');
        }

        $this->comment->delete();
        $this->emitUp('set_info', $this->comment->post_id);
    }

    public function getCanDeleteProperty()
    {
        $can_delete = false;

        if (auth()->check()) {
            if (auth()->id() === $this->comment->user_id || in_array(auth()->user()->role, ['super_admin', 'admin'])) {
                $can_delete = true;
            }
        }

        return $can_delete;
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
