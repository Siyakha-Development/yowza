<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
       
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        View::composer('*', function ($view) {
            // Check if the user is authenticated before accessing the ID
            $userId = Auth::id();
            $view->with('userId', $userId);
        });
    }
}
