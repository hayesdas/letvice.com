<?php

namespace App\Providers;

use App\Filters\CategoryFilter;
use App\Filters\FilterInterface;
use App\Filters\PriceFilter;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

        /**
     * Все связывания контейнера, которые должны быть зарегистрированы.
     *
     * @var array
     */
    public $bindings = [
        // FilterInterface::class => PriceFilter::class,
    ];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
