<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Livewire\Component;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Component::macro('notify', function ($message) {
            $this->dispatchBrowserEvent('notify', ['message' => $message]);
        });

        Component::macro('snotify', function ($message) {
            $this->dispatchBrowserEvent('notify', ['type' => 'success', 'message' => $message]);
        });

        Component::macro('enotify', function ($message) {
            $this->dispatchBrowserEvent('notify', ['type' => 'error', 'message' => $message]);
        });

        if (class_exists('App\Models\Category')) {
            View::share('headerCategories', $this->setMenuCategories());
        }
    }

    private function setMenuCategories()
    {
        /**
         * TODO Post count
         */
        return Category::orderBy('title')->get();
    }
}
