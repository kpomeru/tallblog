<?php

namespace App\Http\Livewire\Pages\Manage;

use App\Http\Livewire\DataTable\WithPerPagePagination;
use App\Http\Livewire\DataTable\WithSorting;
use App\Models\User;
use Livewire\Component;

class UsersPage extends Component
{
    use WithPerPagePagination;
    use WithSorting;

    protected $listeners = [
        '$refresh',
        'resetPage',
    ];

    public $filters = [
        'search' => '',
    ];

    protected $queryString = [
        'sorts',
    ];

    public function render()
    {
        return view('livewire.pages.manage.users-page', [
            'list' => $this->rows
        ])->extends('layouts.manage', ['title' => 'Manage Users'])->section('manage_content');
    }

    public function updatedFilters()
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->reset('filters');
    }

    public function getRowsProperty()
    {
        return $this->applyPagination($this->rowsQuery);
    }

    public function getRowsQueryProperty()
    {
        $query = User::query()
            ->when($this->filters['search'], fn ($q, $v) => $q->where('id', 'like', '%' . $v . '%')
                ->orWhere('role', 'like', '%' . $v . '%')
                ->orWhere('username', 'like', '%' . $v . '%')
                ->orWhere('created_at', 'like', '%' . $v . '%')
                ->orWhere('email', 'like', '%' . $v . '%'));

        return $this->applySorting($query, 'created_at', 'desc');
    }
}
