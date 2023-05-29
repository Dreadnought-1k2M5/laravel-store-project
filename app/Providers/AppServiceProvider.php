<?php

namespace App\Providers;

use App\Models\Products;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
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
        //remove this line when doing migreate:refresh --seed

        if (Schema::hasTable('products')) {
            // Table exists
            View::share('categories', Products::category()->get());
        } else {
            // Table does not exist
            View::share('categories', []);
        }
    }
}
