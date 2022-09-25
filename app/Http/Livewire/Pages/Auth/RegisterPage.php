<?php

namespace App\Http\Livewire\Pages\Auth;

use App\Models\User;
use App\Traits\UserTrait;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class RegisterPage extends Component
{
    use UserTrait;

    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';

    /** @var string */
    public $passwordConfirmation = '';

    public function register()
    {
        // $this->emitTo('components.ui.notifications', 'setData', ['message' => 'this is a new message' . rand(0, 1000), 'type' => 'success']);
        // return;

        $this->validate([
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'same:passwordConfirmation'],
        ]);

        $user = User::create([
            'email' => $this->email,
            'username' => $this->setUsername(),
            'password' => Hash::make($this->password),
        ]);

        event(new Registered($user));
        Auth::login($user, true);
        return redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.pages.auth.register-page')->extends('layouts.auth');
    }
}
