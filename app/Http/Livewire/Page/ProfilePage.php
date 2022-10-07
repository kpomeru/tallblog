<?php

namespace App\Http\Livewire\Page;

use Livewire\Component;

class ProfilePage extends Component
{
    public function render()
    {
        return view('livewire.page.profile-page')->extends('layouts.app');
    }
}
