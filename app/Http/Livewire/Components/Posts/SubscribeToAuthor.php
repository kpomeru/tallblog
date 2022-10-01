<?php

namespace App\Http\Livewire\Components\Posts;

use App\Models\User;
use App\Traits\SharedTrait;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class SubscribeToAuthor extends Component
{
    use SharedTrait;

    /** @var string */
    public $authorId;

    /** @var bool */
    public $subscribed = false;

    public function mount($authorId)
    {
        $this->authorId = $authorId;
        $this->set_subscribed();
    }

    public function render()
    {
        return view('livewire.components.posts.subscribe-to-author');
    }

    public function set_subscribed()
    {
        if (auth()->check()) {
            $exists = auth()->user()->subscriptions()->whereUserId($this->authorId)->first();
            $this->subscribed = $exists !== null ? true : false;
        }
    }

    public function subscribe_or_unsubscribe()
    {
        if (!auth()->check()) {
            return $this->redirect_guest();
        }

        if ($this->subscribed) {
            auth()->user()->subscriptions()->detach($this->authorId);
        } else {
            auth()->user()->subscriptions()->syncWithoutDetaching([$this->authorId]);
            $this->snotify("");
        }

        $this->set_subscribed();
    }
}
