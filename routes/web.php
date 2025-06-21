<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\Umkm\DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('umkm')->name('umkm.')->group(function () {
        Route::get('verifications', [App\Http\Controllers\UmkmController::class, 'verification'])->name('verifications.index');
        Route::resource('biodatas', App\Http\Controllers\Umkm\BiodataController::class);
        Route::resource('products', App\Http\Controllers\Umkm\ProductController::class);
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
