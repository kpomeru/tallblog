<?php

use App\Http\Livewire\Pages\Posts\CreatePostPage;
use App\Http\Livewire\Pages\Posts\EditPostPage;
use App\Http\Livewire\Pages\Posts\PostPage;
use App\Http\Livewire\Pages\Posts\PostsPage;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'posts'], function () {
    Route::get('/list/{category:slug?}', PostsPage::class)->name('posts');
    Route::get('/create', CreatePostPage::class)->middleware(['auth'])->name('create.post');
    Route::group(['prefix' => '{post:slug}'], function () {
        Route::get('/', PostPage::class)->name('post');
        Route::get('/edit', CreatePostPage::class)->middleware(['auth'])->name('edit.post');
    });
});
