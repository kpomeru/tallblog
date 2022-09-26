<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect(string $platform = 'google'): RedirectResponse
    {
        // if (!in_array($platform, ['google'])) {
        //     session()->flash('error', "{$platform} social login not supported");
        //     return redirect(route('home'));
        // }
        return Socialite::driver($platform)->redirect();
    }

    public function callback(string $platform = 'google'): RedirectResponse
    {
        $social_user = Socialite::driver($platform)->user();
        dd($social_user);
        // return Socialite::driver($platform)->redirect();
    }
}
