<?php

namespace App\Http\Livewire\DataTable;

trait WithSorting
{
    public $sorts = [];

    public function sortBy($field)
    {
        if (! isset($this->sorts[$field])) return $this->sorts[$field] = 'asc';
        if ($this->sorts[$field] === 'asc') return $this->sorts[$field] = 'desc';
        unset($this->sorts[$field]);
    }

    public function applySorting($query, $defaultField = '', $dir = 'asc')
    {
        if (count($this->sorts)) {
            foreach ($this->sorts as $field => $direction) {
                $query->orderBy($field, $direction);
            }
        } elseif (isset($defaultField)) {
            $query->orderBy($defaultField, $dir);
        }

        return $query;
    }
}
