<?php

namespace App\Http\Livewire\Components;

use App\Models\User;
use Livewire\Component;

class ChoosePreferredSubscriptions extends Component
{
    /** @var array */
    public $authors = [];

    /** @var array */
    public $selected = [];

    public function booted()
    {
        $this->selected = auth()->user()->subscriptions->pluck('id');
    }

    public function mount()
    {
        $this->authors = User::whereIn('role', ['contributor', 'admin'])->has('posts', '>', 2)->whereNotIn('id', $this->selected)->inRandomOrder()->limit(6)->get()->toArray();
    }

    public function render()
    {
        return view('livewire.components.choose-preferred-subscriptions');
    }

    public function save(): void
    {
        auth()->user()->subscriptions()->sync($this->selected);
    }

    public function updatedSelected()
    {
        $this->save();
    }
}
