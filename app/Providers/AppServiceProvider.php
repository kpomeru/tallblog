<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
