<?php

namespace App\Http\Livewire\Components;

use App\Models\Category;
use Livewire\Component;

class ChoosePreferredCategories extends Component
{
    /** @var array */
    public $categories = [];

    /** @var bool */
    public $profile = false;

    /** @var array */
    public $selected = [];

    public function booted()
    {
        $this->selected = auth()->user()->categories->pluck('id');
    }

    public function mount($profile = false)
    {
        $this->profile = $profile;
        $this->categories = Category::get()->toArray();
    }

    public function render()
    {
        return view('livewire.components.choose-preferred-categories');
    }

    public function save(): void
    {
        auth()->user()->categories()->sync($this->selected);
        if ($this->profile) {
            $this->snotify('Preferred categories updated.');
        }
    }

    public function updatedSelected()
    {
        $this->save();
    }
}
