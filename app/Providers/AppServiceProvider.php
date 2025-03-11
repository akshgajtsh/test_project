<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\indexRepositoryInterface;
use App\Repositories\indexRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(indexRepositoryInterface::class, indexRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
