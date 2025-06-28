<?php

use App\Http\Controllers\HistoryController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    // Dashboard UMKM
    Route::get('/', [App\Http\Controllers\Umkm\DashboardController::class, 'index'])->name('umkm.dashboard')
        ->middleware('role:umkm');

    Route::post('histories', [HistoryController::class, 'store'])->name('histories.store');
    Route::delete('histories', [HistoryController::class, 'destroy'])->name('histories.destroy');

    // UMKM
    Route::middleware(['role:umkm'])->group(function () {
        Route::prefix('umkm')->name('umkm.')->group(function () {
            Route::get('verifications', [App\Http\Controllers\Umkm\VerificationController::class, 'index'])->name('verifications.index');
            Route::resource('biodatas', App\Http\Controllers\Umkm\BiodataController::class);
            Route::resource('products', App\Http\Controllers\Umkm\ProductController::class);
            Route::resource('incomes', App\Http\Controllers\Umkm\IncomeController::class);
            Route::resource('sector-category-umkms', App\Http\Controllers\Umkm\SectorCategoryUmkmController::class);
            Route::resource('services', App\Http\Controllers\Umkm\ServiceController::class);
            Route::resource('service-umkms', App\Http\Controllers\Umkm\ServiceUmkmController::class);
            Route::resource('umkms', App\Http\Controllers\Umkm\UmkmController::class);
            Route::get('/umkms/{umkm}/product', [App\Http\Controllers\Umkm\UmkmController::class, 'product'])->name('umkms.product');
            Route::get('/umkms/{umkm}/performance', [App\Http\Controllers\Umkm\UmkmController::class, 'performance'])->name('umkms.performance');
        });
    });

    // Link Productive
    Route::middleware('role:admin_lp')->group(function () {
        Route::prefix('link-productive')->name('link-productive.')->group(function () {
            // Dashboard Link Productive
            Route::get('/', [App\Http\Controllers\LinkProductive\DashboardController::class, 'index'])->name('dashboard');

            Route::resource('verifications', App\Http\Controllers\LinkProductive\VerificationController::class);
            Route::resource('sector-categories', App\Http\Controllers\LinkProductive\SectorCategoryController::class);
            Route::resource('business-scales', App\Http\Controllers\LinkProductive\BusinessScaleController::class);
            Route::resource('certifications', App\Http\Controllers\LinkProductive\CertificationController::class);
            Route::resource('users', App\Http\Controllers\LinkProductive\UserController::class);
            Route::resource('umkms', App\Http\Controllers\LinkProductive\UmkmController::class);
            Route::resource('umkm-statuses', App\Http\Controllers\LinkProductive\UmkmStatusController::class);
            Route::resource('supports', App\Http\Controllers\LinkProductive\SupportController::class);
            Route::get('/umkms/{umkm}/performance', [App\Http\Controllers\LinkProductive\UmkmController::class, 'performance'])->name('umkms.performance');
            Route::get('/umkms/{umkm}/performance/{income}/edit', [App\Http\Controllers\LinkProductive\IncomeController::class, 'edit'])->name('umkms.performance.edit');
            Route::get('/umkms/{umkm}/performance/create', [App\Http\Controllers\LinkProductive\IncomeController::class, 'create'])->name('umkms.performance.create');
            Route::post('/umkms/{umkm}/performance/store', [App\Http\Controllers\LinkProductive\IncomeController::class, 'store'])->name('umkms.performance.store');
            Route::delete('/umkms/{umkm}/performance/{income}', [App\Http\Controllers\LinkProductive\IncomeController::class, 'destroy'])->name('umkms.performance.destroy');
            Route::put('/umkms/{umkm}/performance/{income}', [App\Http\Controllers\LinkProductive\IncomeController::class, 'update'])->name('umkms.performance.update');
            Route::get('/umkms/{umkm}/umkm-status/edit', [App\Http\Controllers\LinkProductive\IncomeController::class, 'umkmStatusEdit'])->name('umkms.umkm-status.edit');
            Route::patch('/umkms/{umkm}/umkm-status', [App\Http\Controllers\LinkProductive\IncomeController::class, 'umkmStatusUpdate'])->name('umkms.umkm-status.update');
            Route::get('/umkms/{umkm}/product', [App\Http\Controllers\LinkProductive\ProductController::class, 'index'])->name('umkms.product.index');
            Route::get('/umkms/{umkm}/product/create', [App\Http\Controllers\LinkProductive\ProductController::class, 'create'])->name('umkms.product.create');
            Route::post('/umkms/{umkm}/product', [App\Http\Controllers\LinkProductive\ProductController::class, 'store'])->name('umkms.product.store');
            Route::get('/umkms/{umkm}/product/{product}/edit', [App\Http\Controllers\LinkProductive\ProductController::class, 'edit'])->name('umkms.product.edit');
            Route::put('/umkms/{umkm}/product/{product}', [App\Http\Controllers\LinkProductive\ProductController::class, 'update'])->name('umkms.product.update');
            Route::delete('/umkms/{umkm}/product/{product}', [App\Http\Controllers\LinkProductive\ProductController::class, 'destroy'])->name('umkms.product.destroy');
            Route::get('/umkms/{umkm}/biodata/create', [App\Http\Controllers\LinkProductive\BiodataController::class, 'create'])->name('umkms.biodata.create');
            Route::post('/umkms/{umkm}/biodata', [App\Http\Controllers\LinkProductive\BiodataController::class, 'store'])->name('umkms.biodata.store');
            Route::get('/umkms/{umkm}/biodata/edit', [App\Http\Controllers\LinkProductive\BiodataController::class, 'edit'])->name('umkms.biodata.edit');
            Route::put('/umkms/{umkm}/biodata/{biodata}', [App\Http\Controllers\LinkProductive\BiodataController::class, 'update'])->name('umkms.biodata.update');
            Route::delete('/umkms/{umkm}/biodata/{biodata}', [App\Http\Controllers\LinkProductive\BiodataController::class, 'destroy'])->name('umkms.biodata.destroy');
            Route::get('/umkms/{umkm}/sector-category-umkm', [App\Http\Controllers\LinkProductive\SectorCategoryUmkmController::class, 'index'])->name('umkms.sector-category-umkm.index');
            Route::get('/umkms/{umkm}/sector-category-umkm/create', [App\Http\Controllers\LinkProductive\SectorCategoryUmkmController::class, 'create'])->name('umkms.sector-category-umkm.create');
            Route::post('/umkms/{umkm}/sector-category-umkm', [App\Http\Controllers\LinkProductive\SectorCategoryUmkmController::class, 'store'])->name('umkms.sector-category-umkm.store');
            Route::get('/umkms/{umkm}/sector-category-umkm/{sector_category_umkm}/edit', [App\Http\Controllers\LinkProductive\SectorCategoryUmkmController::class, 'edit'])->name('umkms.sector-category-umkm.edit');
            Route::put('/umkms/{umkm}/sector-category-umkm/{sector_category_umkm}', [App\Http\Controllers\LinkProductive\SectorCategoryUmkmController::class, 'update'])->name('umkms.sector-category-umkm.update');
            Route::delete('/umkms/{umkm}/sector-category-umkm/{sector_category_umkm}', [App\Http\Controllers\LinkProductive\SectorCategoryUmkmController::class, 'destroy'])->name('umkms.sector-category-umkm.destroy');
            Route::resource('service-categories', App\Http\Controllers\LinkProductive\ServiceCategoryController::class);
            Route::resource('services', App\Http\Controllers\LinkProductive\ServiceController::class);
            Route::resource('service-umkms', App\Http\Controllers\LinkProductive\ServiceUmkmController::class);
        });
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
