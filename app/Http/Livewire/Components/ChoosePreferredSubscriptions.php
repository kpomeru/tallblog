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
        // dd($this->selected);
        // $subscriptions = User::whereIn('id', $this->selected)->get()->toArray();
        $this->authors = User::whereIn('role', ['contributor', 'admin'])->whereNotIn('id', $this->selected)->inRandomOrder()->limit(6)->get()->toArray();
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
