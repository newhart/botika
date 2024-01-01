<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('app', function ($view) {
            $cart = \Cart::getContent()->toArray();
            $count = \Cart::getContent()->count();
            $view->with([
                'cart' => $cart,
                'count' => $count
            ]);
        });
    }
}
