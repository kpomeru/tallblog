<?php

namespace App\Http\Livewire\Components\Posts;

use App\Models\Like;
use App\Models\Post;
use App\Traits\SharedTrait;
use Livewire\Component;

class CommentsLikes extends Component
{
    use SharedTrait;

    protected $listeners = ['$refresh'];

    /** @var object */
    public Like $like;

    /** @var bool */
    public $open = false;

    /** @var object */
    public Post $post;

    public function mount($id)
    {
        $this->set_info($id);
    }

    public function render()
    {
        return view('livewire.components.posts.comments-likes');
    }


    public function like_unlike($vote)
    {
        if (!auth()->check()) {
            $this->enotify('Unauthenticated.');
            return;
        }
        $vote = boolval($vote);

        if (!isset($this->like)) {
            $this->post->likes()->create(['user_id' => auth()->id(), 'vote' => $vote]);
        } else {
            $this->like->update([
                'vote' => !$this->like->vote
            ]);
        }

        $this->set_info($this->post->id);
    }

    public function set_info($id)
    {
        $this->post = Post::whereId($id)->withTrashed()->with(['comments', 'likes'])->first();

        if (auth()->check()) {
            $like = $this->post->likes()->whereUserId(auth()->id())->first();
            if ($like) {
                $this->like = $like;
            }
        }
    }
}
