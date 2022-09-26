<?php

namespace App\Http\Livewire\Components\Ui;

use App\Models\Category;
use Livewire\Component;

class Categories extends Component
{
    public $categories;
    
    public function mount()
    {
        $list = Category::get();
    }

    public function render()
    {
        return view('livewire.components.ui.categories');
    }
}
