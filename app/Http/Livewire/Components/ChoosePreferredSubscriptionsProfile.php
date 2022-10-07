<?php

namespace App\Http\Livewire\Components;

use App\Http\Livewire\DataTable\WithPerPagePagination;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ChoosePreferredSubscriptionsProfile extends Component
{
    use WithPagination;
    // use WithPerPagePagination;

    /** @var string */
    public $search = '';

    /** @var array */
    public $selected = [];

    public function booted()
    {
        $this->selected = auth()->user()->subscriptions->pluck('id');
    }

    public function mount()
    {
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.components.choose-preferred-subscriptions-profile', [
            'authors' => User::whereIn('role', ['contributor', 'admin'])
                ->has('posts', '>', 2)
                ->where('username', 'like', '%' . $this->search . '%')
                ->orderBy('username')
                ->paginate(9)
        ]);
    }

    public function save(): void
    {
        auth()->user()->subscriptions()->sync($this->selected);
        $this->snotify('Preferred authors updated.');
    }

    public function updatedSelected()
    {
        $this->save();
    }
}
