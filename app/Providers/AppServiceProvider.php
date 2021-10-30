<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        view()->composer('*', function ($view) {
            if (Auth::guard('admin')->check()) {
                $view->with('theme', (Auth::guard('admin')->user()->background) ? Auth::guard('admin')->user()->background : 'primary');
            } elseif (Auth::guard('company')->check()) {
                $view->with('theme', (Auth::guard('company')->user()->background) ? Auth::guard('company')->user()->background : 'primary');
            } elseif (Auth::check()) {
                $view->with('theme', (Auth::user()->background) ? Auth::user()->background : 'primary');
            } else {
                $view->with('theme', 'primary');
            }
        });
        Schema::defaultStringLength(191);
    }
}
