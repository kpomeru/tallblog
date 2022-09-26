<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Livewire\Pages\Auth\LoginPage;
use App\Http\Livewire\Pages\Auth\Passwords\ConfirmPage;
use App\Http\Livewire\Pages\Auth\Passwords\EmailPage;
use App\Http\Livewire\Pages\Auth\Passwords\ResetPage;
use App\Http\Livewire\Pages\Auth\RegisterPage;
use App\Http\Livewire\Pages\Auth\VerifyPage;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', LoginPage::class)
            ->name('login');

        Route::group(['prefix' => 'password/reset'], function () {
            Route::get('/', EmailPage::class)
                ->name('password.request');

            Route::get('/{token}', ResetPage::class)
                ->name('password.reset');
        });

        Route::group(['prefix' => 'social'], function () {
            Route::get('/redirect/{platform?}', [SocialiteController::class, 'redirect'])
                ->whereIn('platform', config('tallblog.social_logins'))
                ->name('auth.social.redirect');

            Route::get('/callback/{platform}', [SocialiteController::class, 'callback'])
                ->whereIn('platform', config('tallblog.social_logins'))
                ->name('auth.social.callback');
        });

        Route::get('register', RegisterPage::class)
            ->name('register');
    });


    Route::middleware('auth')->group(function () {
        Route::get('email/verify', VerifyPage::class)
            ->middleware('throttle:6,1')
            ->name('verification.notice');

        Route::get('password/confirm', ConfirmPage::class)
            ->name('password.confirm');

        Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
            ->middleware('signed')
            ->name('verification.verify');

        Route::post('logout', LogoutController::class)
            ->name('logout');
    });
});
