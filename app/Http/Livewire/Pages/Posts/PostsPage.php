<?php

namespace App\Http\Livewire\Pages\Posts;

use App\Http\Livewire\DataTable\WithPerPagePagination;
use App\Http\Livewire\DataTable\WithSorting;
use App\Models\Category;
use App\Models\Post;
use Livewire\Component;

class PostsPage extends Component
{
    use WithPerPagePagination;
    use WithSorting;

    /** @var object */
    public $category;

    /** @var string */
    public $search;

    /** @var bool */
    public $showSearch = false;

    protected $listeners = ['$refresh', 'setCategory'];

    public function mount(Category $category)
    {
        $this->perPage = 10;

        if (isset($category)) {
            $this->category = $category;
        }
    }

    public function render()
    {
        return view('livewire.pages.posts.posts-page', ['list' => $this->rows, 'title' => $this->title])->extends('layouts.app');
    }

    public function getRowsProperty()
    {
        return $this->applyPagination($this->rowsQuery);
    }

    public function getRowsQueryProperty()
    {
        $search = $this->search;

        $query = Post::query()
            ->when($this->category, fn ($q, $v) => $q->whereCategoryId($v->id))
            ->whereNotNull('published_at')
            // ->unless(auth()->check() && auth()->user()->is_admin, fn ($q) => $q->whereNotNull('published_at'))
            ->when($search, function ($q) use ($search) {
                $q->whereNotNull('published_at')
                    ->where(function ($q) use ($search) {
                        $q->where('id', 'like', '%' . $search . '%')
                            ->orWhere('title', 'like', '%' . $search . '%')
                            ->orWhere('excerpt', 'like', '%' . $search . '%')
                            ->orWhere('created_at', 'like', '%' . $search . '%')
                            ->orWhere(function ($q) use ($search) {
                                $q
                                    // ->when($this->category, fn ($q, $v) => $q->whereCategoryId($v->id))
                                    ->whereNotNull('published_at')->whereHas('user', function ($q) use ($search) {
                                        $q->where('username', 'like', '%' . $search . '%');
                                    });
                            });
                    });
            })
            ->with(['category', 'user']);

        return $this->applySorting($query, 'created_at', 'desc');
    }

    public function getTitleProperty()
    {
        if (!isset($this->category)) {
            return "Posts";
        }

        return ucwords($this->category->title) . " Posts";
    }

    public function resetSearch()
    {
        $this->reset('search');
    }

    public function setCategory($slug = 'all')
    {
        $this->resetSearch();
        $this->resetPage();

        if (isset($slug) && $slug[0] !== 'all') {
            if ($c = Category::whereSlug($slug)->first()) {
                $this->category = $c;
            }
            return;
        } else {
            $this->category = null;
        }
    }

    public function updatedSearch($value)
    {
        if (isset($value)) {
            $this->emit('postSearch');
        }
    }

    public function updatingSearch()
    {
        $this->reset('category');
        $this->resetPage();
    }
}
