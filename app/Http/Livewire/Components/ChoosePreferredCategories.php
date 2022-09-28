<?php

namespace App\Http\Livewire\Components;

use App\Models\Category;
use Livewire\Component;

class ChoosePreferredCategories extends Component
{
    /** @var array */
    public $categories = [];

    /** @var array */
    public $selected = [];

    public function booted()
    {
        $this->selected = auth()->user()->categories->pluck('id');
    }

    public function mount()
    {
        $this->categories = Category::get()->toArray();
    }

    public function render()
    {
        return view('livewire.components.choose-preferred-categories');
    }

    public function save(): void
    {
        auth()->user()->categories()->sync($this->selected);
    }

    public function updatedSelected()
    {
        $this->save();
    }
}
