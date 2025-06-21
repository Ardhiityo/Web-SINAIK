<?php

namespace App\Providers;

use App\Services\Interfaces\Umkm\UmkmInterface;
use App\Services\Repositories\Umkm\UmkmRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(UmkmInterface::class, UmkmRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
