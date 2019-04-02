<?php

namespace App\Providers;
use App\Billing\Stripe;
use App\Post;
use App\Tag;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

    //protected $defer=true; // only loaded when requested.
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        //when the layouts side bar is loaded, register a callback function which bind the archives to that view
        view()->composer('layouts.includes.blog_sidebar', function($view) {
            $archives=Post::archives();
            $tags=Tag::has('posts')->pluck('name');
//            $view->with('archives', Post::archives());
//            $view->with('tags', Tag::has('posts')->pluck('name'));
             $view->with(compact(['archives','tags']));
        });
    }

    /**
     * Register any application services into the service container
     *
     * @return void
     */
    public function register() {
        $this->app->singleton(Stripe::class, function($app) {
//            $app->make('');
            return new Stripe(config('services.stripe.secret'));
        });
    }

}
