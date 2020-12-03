<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use Cart;

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
        //Menu - Product Category
        view()->composer('web.inc.menu', function ($view) {
            $view->with('productCategories', Category::where('pub_status', 0)->get());
        });
    }
}
