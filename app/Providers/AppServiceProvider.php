<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
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
        if (env('APP_ENV') === 'production') {
            URL::forceSchema('https');
        }

        Component::macro('notify', function ($message) {
            $this->dispatchBrowserEvent('notify', ['type' => 'info', 'message' => $message]);
        });

        Component::macro('snotify', function ($message) {
            $this->dispatchBrowserEvent('notify', ['type' => 'success', 'message' => $message]);
        });

        Component::macro('enotify', function ($message) {
            $this->dispatchBrowserEvent('notify', ['type' => 'error', 'message' => $message]);
        });

        Component::macro('anotify', function () {
            $this->dispatchBrowserEvent('notify', ['type' => 'error', 'message' => "Access Denied, you are not authorized to perform this action."]);
        });

        View::share('headerCategories', $this->setMenuCategories());
    }

    private function setMenuCategories()
    {
        try {
            DB::connection()->getPDO();
            return Category::orderBy('title')->get();
        } catch (\Exception $e) {
            return [];
        }
    }
}
