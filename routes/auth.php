<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Livewire\Pages\Auth\LoginPage;
use App\Http\Livewire\Pages\Auth\Passwords\ConfirmPage;
use App\Http\Livewire\Pages\Auth\Passwords\EmailPage;
use App\Http\Livewire\Pages\Auth\Passwords\ResetPage;
use App\Http\Livewire\Pages\Auth\RegisterPage;
use App\Http\Livewire\Pages\Auth\VerifyPage;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('login', LoginPage::class)
        ->name('login');

    Route::get('register', RegisterPage::class)
        ->name('register');
});

Route::get('password/reset', EmailPage::class)
    ->name('password.request');

Route::get('password/reset/{token}', ResetPage::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', VerifyPage::class)
        // ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', ConfirmPage::class)
        ->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});
