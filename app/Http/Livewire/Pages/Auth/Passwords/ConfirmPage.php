<?php

namespace App\Http\Livewire\Pages\Auth\Passwords;

use Livewire\Component;

class ConfirmPage extends Component
{
    /** @var string */
    public $password = '';

    public function confirm()
    {
        $this->validate([
            'password' => 'required|current_password',
        ]);

        session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.pages.auth.passwords.confirm-page')->extends('layouts.auth');
    }
}
