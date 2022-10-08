<?php

use App\Http\Controllers\DashboardController;
use App\Http\Livewire\Pages\Manage\CategoriesPage;
use App\Http\Livewire\Pages\Manage\UsersPage;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'manage', 'middleware' => ['admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('manage.dashboard');
    Route::get('/categories', CategoriesPage::class)->name('manage.categories');
    Route::get('/users', UsersPage::class)->name('manage.users');
});
