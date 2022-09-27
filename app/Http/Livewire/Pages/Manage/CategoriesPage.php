<?php

namespace App\Http\Livewire\Pages\Manage;

use App\Http\Livewire\DataTable\WithPerPagePagination;
use App\Http\Livewire\DataTable\WithSorting;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class CategoriesPage extends Component
{
    use WithPerPagePagination;
    use WithSorting;

    protected $listeners = [
        '$refresh',
        'resetPage',
    ];

    protected $queryString = [
        'sorts',
    ];

    public function mount()
    {
        //
    }

    public function render()
    {
        return view('livewire.pages.manage.categories-page', [
            'list' => $this->rows
        ])->extends('layouts.manage', ['title' => 'Manage Categories'])->section('manage_content');
    }

    public function getRowsProperty()
    {
        return $this->rowsQuery->get();
    }

    public function getRowsQueryProperty()
    {
        $query = Category::query()->orderBy('title');
        return $this->applySorting($query, 'created_at', 'desc');
    }
}
