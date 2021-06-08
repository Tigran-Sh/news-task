<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use App\Observers\PostObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191);
        Post::observe(PostObserver::class);

        view()->composer(['layouts.app'], function($view){
            $categories = Category::all();
            $view->with([
                'categories' => $categories
            ]);
        });
    }
}
