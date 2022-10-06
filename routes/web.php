<?php

use App\Http\Livewire\Pages\ChoosePreferencesPage;
use App\Notifications\NewCommentNotification;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome')->name('home');
require __DIR__ . '/auth.php';
require __DIR__ . '/posts.php';

Route::group(['middleware' => ['auth']], function () {
    require __DIR__ . '/manage.php';

    Route::get('/preference-selection', ChoosePreferencesPage::class)
        ->middleware('preferred.categories')
        ->name('preference.selection');
});


Route::get('/notification', function () {
    $comment = \App\Models\Comment::inRandomOrder()->first();

    return (new NewCommentNotification($comment))
        ->toMail($comment->post->user);
});
