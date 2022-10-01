<?php

namespace App\Http\Livewire\Pages\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginPage extends Component
{
    /** @var string */
    public $email = '';

    /** @var string */
    public $intended = '';

    /** @var string */
    public $password = '';

    /** @var bool */
    public $remember = false;

    protected $rules = [
        'email' => ['required', 'email', 'exists:users'],
        'password' => ['required'],
    ];

    public function mount()
    {
        if (session()->has('intended_url')) {
            $this->intended = session()->get('intended_url');
            session()->forget('intended_url');
        }
    }

    public function authenticate()
    {
        $this->validate();

        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            $this->addError('email', trans('auth.failed'));

            return;
        }

        return redirect()->intended($this->intended ?? route('home'));
    }

    public function render()
    {
        return view('livewire.pages.auth.login-page')->extends('layouts.auth');
    }
}
