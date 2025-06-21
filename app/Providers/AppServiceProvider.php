<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Interfaces\Umkm\UmkmInterface;
use App\Services\Repositories\Umkm\UmkmRepository;
use App\Services\Interfaces\LinkProductive\BusinessScaleInterface;
use App\Services\Interfaces\LinkProductive\CertificationInterface;
use App\Services\Repositories\LinkProductive\BusinessScaleRepository;
use App\Services\Repositories\LinkProductive\CertificationRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(UmkmInterface::class, UmkmRepository::class);
        $this->app->singleton(BusinessScaleInterface::class, BusinessScaleRepository::class);
        $this->app->singleton(CertificationInterface::class, CertificationRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
