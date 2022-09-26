<?php

use App\Http\Livewire\Pages\Manage\CategoriesPage;
use App\Http\Livewire\Pages\Manage\UsersPage;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'manage', 'middleware' => ['admin']], function () {
    Route::get('/dashboard', function () {
        return view('manage.dashboard');
    })->name('manage.dashboard');

    Route::get('/categories', CategoriesPage::class)->name('manage.categories');
    Route::get('/users', UsersPage::class)->name('manage.users');
});
