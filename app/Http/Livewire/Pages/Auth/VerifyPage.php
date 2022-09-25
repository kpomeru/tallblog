<?php

namespace App\Http\Livewire\Pages\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class VerifyPage extends Component
{
    public function mount()
    {
        if (Auth::user()->hasVerifiedEmail()) {
            return redirect(route('home'));
        }
    }

    public function resend()
    {
        if (Auth::user()->hasVerifiedEmail()) {
            redirect(route('home'));
        }

        Auth::user()->sendEmailVerificationNotification();
        $this->emit('resent');
        session()->flash('resent');
    }

    public function render()
    {
        return view('livewire.pages.auth.verify-page')->extends('layouts.auth');
    }
}
