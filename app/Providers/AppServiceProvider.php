<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(\App\Services\Interfaces\Umkm\UmkmInterface::class, \App\Services\Repositories\Umkm\UmkmRepository::class);
        $this->app->singleton(\App\Services\Interfaces\LinkProductive\BusinessScaleInterface::class, \App\Services\Repositories\LinkProductive\BusinessScaleRepository::class);
        $this->app->singleton(\App\Services\Interfaces\LinkProductive\CertificationInterface::class, \App\Services\Repositories\LinkProductive\CertificationRepository::class);
        $this->app->singleton(\App\Services\Interfaces\LinkProductive\SectorCategoryInterface::class, \App\Services\Repositories\LinkProductive\SectorCategoryRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
