<?php

namespace App\Providers;

use App\Models\categories;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
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
        //
        $categories = new categories();
        $dataCategories = $categories->getAll();
       View::share(['dataCategories' => $dataCategories

        ]);
    }
}
