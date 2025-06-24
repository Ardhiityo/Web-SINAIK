<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    // Dashboard UMKM
    Route::get('/', [App\Http\Controllers\Umkm\DashboardController::class, 'index'])->name('dashboard');

    // UMKM
    Route::prefix('umkm')->name('umkm.')->group(function () {
        Route::get('verifications', [App\Http\Controllers\Umkm\UmkmController::class, 'verification'])->name('verifications.index');
        Route::resource('biodatas', App\Http\Controllers\Umkm\BiodataController::class);
        Route::resource('products', App\Http\Controllers\Umkm\ProductController::class);
        Route::resource('incomes', App\Http\Controllers\Umkm\IncomeController::class);
        Route::resource('sector-category-umkms', App\Http\Controllers\Umkm\SectorCategoryUmkmController::class);
        Route::resource('services', App\Http\Controllers\Umkm\ServiceController::class);
        Route::resource('service-umkms', App\Http\Controllers\Umkm\ServiceUmkmController::class);
    });

    // Link Productive
    Route::prefix('link-productive')->name('link-productive.')->group(function () {
        Route::resource('verifications', App\Http\Controllers\LinkProductive\VerificationController::class);
        Route::resource('sector-categories', App\Http\Controllers\LinkProductive\SectorCategoryController::class);
        Route::resource('business-scales', App\Http\Controllers\LinkProductive\BusinessScaleController::class);
        Route::resource('certifications', App\Http\Controllers\LinkProductive\CertificationController::class);
        Route::resource('umkms', App\Http\Controllers\LinkProductive\UmkmController::class);
        Route::get('/umkms/{umkm}/performances', [App\Http\Controllers\LinkProductive\UmkmController::class, 'performance'])->name('umkms.performance');
        Route::get('/umkms/{umkm}/performances/{income}/edit', [App\Http\Controllers\LinkProductive\IncomeController::class, 'edit'])->name('umkms.performance.edit');
        Route::delete('/umkms/{umkm}/performances/{income}', [App\Http\Controllers\LinkProductive\IncomeController::class, 'destroy'])->name('umkms.performance.destroy');
        Route::put('/umkms/{umkm}/performances/{income}', [App\Http\Controllers\LinkProductive\IncomeController::class, 'update'])->name('umkms.performance.update');
        Route::get('/umkms/{umkm}/products', [App\Http\Controllers\LinkProductive\ProductController::class, 'index'])->name('umkms.product.index');
        Route::get('/umkms/{umkm}/products/create', [App\Http\Controllers\LinkProductive\ProductController::class, 'create'])->name('umkms.product.create');
        Route::post('/umkms/{umkm}/products', [App\Http\Controllers\LinkProductive\ProductController::class, 'store'])->name('umkms.product.store');
        Route::get('/umkms/{umkm}/products/{product}', [App\Http\Controllers\LinkProductive\ProductController::class, 'edit'])->name('umkms.product.edit');
        Route::put('/umkms/{umkm}/products/{product}', [App\Http\Controllers\LinkProductive\ProductController::class, 'update'])->name('umkms.product.update');
        Route::delete('/umkms/{umkm}/products/{product}', [App\Http\Controllers\LinkProductive\ProductController::class, 'destroy'])->name('umkms.product.destroy');
        Route::resource('service-categories', App\Http\Controllers\LinkProductive\ServiceCategoryController::class);
        Route::resource('services', App\Http\Controllers\LinkProductive\ServiceController::class);
        Route::resource('service-umkms', App\Http\Controllers\LinkProductive\ServiceUmkmController::class);
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
