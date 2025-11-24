<?php

namespace App\Providers;

use App\Repositories\Product\IProductRepository;
use App\Repositories\Product\ProductsRepository;
use App\Services\Product\IProductsService;
use App\Services\Product\ProductsService;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Product\ICategoryRepository;
use App\Repositories\Product\CategoryRepository;
use App\Services\Product\ICategoryService;
use App\Services\Product\CategoryService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ICategoryRepository::class, CategoryRepository::class);
        $this->app->bind(IProductRepository::class, ProductsRepository::class);

        // Service bindings
        $this->app->bind(ICategoryService::class, CategoryService::class);
        $this->app->bind(IProductsService::class, ProductsService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
