<?php

namespace App\Providers;

use App\Services\Interfaces\HistoryInterface;
use App\Services\Repositories\HistoryRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(HistoryInterface::class, HistoryRepository::class);

        // UMKM
        $this->app->singleton(\App\Services\Interfaces\Umkm\BiodataInterface::class, \App\Services\Repositories\Umkm\BiodataRepository::class);
        $this->app->singleton(\App\Services\Interfaces\Umkm\IncomeInterface::class, \App\Services\Repositories\Umkm\IncomeRepository::class);
        $this->app->singleton(\App\Services\Interfaces\Umkm\ProductInterface::class, \App\Services\Repositories\Umkm\ProductRepository::class);
        $this->app->singleton(\App\Services\Interfaces\Umkm\SectorCategoryInterface::class, \App\Services\Repositories\Umkm\SectorCategoryRepository::class);
        $this->app->singleton(\App\Services\Interfaces\Umkm\ServiceUmkmInterface::class, \App\Services\Repositories\Umkm\ServiceUmkmRepository::class);
        $this->app->singleton(\App\Services\Interfaces\Umkm\UmkmInterface::class, \App\Services\Repositories\Umkm\UmkmRepository::class);

        // Link Productive
        $this->app->singleton(\App\Services\Interfaces\LinkProductive\BusinessScaleInterface::class, \App\Services\Repositories\LinkProductive\BusinessScaleRepository::class);
        $this->app->singleton(\App\Services\Interfaces\LinkProductive\CertificationInterface::class, \App\Services\Repositories\LinkProductive\CertificationRepository::class);
        $this->app->singleton(\App\Services\Interfaces\LinkProductive\SectorCategoryInterface::class, \App\Services\Repositories\LinkProductive\SectorCategoryRepository::class);
        $this->app->singleton(\App\Services\Interfaces\LinkProductive\UmkmInterface::class, \App\Services\Repositories\LinkProductive\UmkmRepository::class);
        $this->app->singleton(\App\Services\Interfaces\LinkProductive\ServiceCategoryInterface::class, \App\Services\Repositories\LinkProductive\ServiceCategoryRepository::class);
        $this->app->singleton(\App\Services\Interfaces\LinkProductive\ServiceInterface::class, \App\Services\Repositories\LinkProductive\ServiceRepository::class);
        $this->app->singleton(\App\Services\Interfaces\LinkProductive\ServiceUmkmInterface::class, \App\Services\Repositories\LinkProductive\ServiceUmkmRepository::class);
        $this->app->singleton(\App\Services\Interfaces\LinkProductive\SupportInterface::class, \App\Services\Repositories\LinkProductive\SupportRepository::class);
        $this->app->singleton(\App\Services\Interfaces\LinkProductive\UserInterface::class, \App\Services\Repositories\LinkProductive\UserRepository::class);
        $this->app->singleton(\App\Services\Interfaces\LinkProductive\SectorCategoryUmkmInterface::class, \App\Services\Repositories\LinkProductive\SectorCategoryUmkmRepository::class);
        $this->app->singleton(\App\Services\Interfaces\LinkProductive\UmkmStatusInterface::class, \App\Services\Repositories\LinkProductive\UmkmStatusRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
