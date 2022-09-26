<?php

namespace App\Http\Livewire\Pages\Auth\Passwords;

use Illuminate\Support\Facades\Password;
use Livewire\Component;

class EmailPage extends Component
{
    /** @var string */
    public $email;

    /** @var string|null */
    public $emailSentMessage = false;

    // public function mount()
    // {
    //     if (auth()->check()) {
    //         return redirect(route('home'));
    //     }
    // }

    public function sendResetPasswordLink()
    {
        $this->validate([
            'email' => ['required', 'email'],
        ]);

        $response = $this->broker()->sendResetLink(['email' => $this->email]);

        if ($response == Password::RESET_LINK_SENT) {
            $this->emailSentMessage = trans($response);
            return;
        }

        $this->addError('email', trans($response));
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker();
    }

    public function render()
    {
        return view('livewire.pages.auth.passwords.email-page')->extends('layouts.auth');
    }
}
