<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

class ChoosePreferencesPage extends Component
{
    public function render()
    {
        return view('livewire.pages.choose-preferences-page')->extends('layouts.auth');
    }
}
