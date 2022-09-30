<?php

namespace App\Http\Livewire\Components\Posts;

use Livewire\Component;

class CategoriesList extends Component
{
    protected $listeners = ['postSearch'];

    /** @var string */
    public $categorySlug;

    public function render()
    {
        return view('livewire.components.posts.categories-list');
    }

    public function postSearch()
    {
        $this->reset('categorySlug');
    }

    public function updatedCategorySlug()
    {
        $this->emitUp('setCategory', [$this->categorySlug]);
        // $this->emitTo('pages.posts.posts-page', 'setCategory', [$this->categorySlug]);
    }
}
