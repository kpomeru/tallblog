<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EmailVerificationController extends Controller
{
    public function redirectWithError()
    {
        Auth::logout();
        session()->regenerate();
        session()->flash('error', 'Unathorized access.');
        return redirect(route('login'));
    }

    public function __invoke(string $id, string $hash): RedirectResponse
    {
        if (!hash_equals((string) $id, (string) Auth::user()->getKey())) {
            return $this->redirectWithError();
        }

        if (!hash_equals((string) $hash, sha1(Auth::user()->getEmailForVerification()))) {
            return $this->redirectWithError();
        }

        if (Auth::user()->hasVerifiedEmail()) {
            return redirect(route('home'));
        }

        if (Auth::user()->markEmailAsVerified()) {
            event(new Verified(Auth::user()));
            session()->flash('success', "Email Verified, now keep on Tallking <i class='fas fa-heart text-red-500'></i>");
        }

        return redirect(route('home'));
    }
}
