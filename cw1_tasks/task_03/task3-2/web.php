<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppearancesController;



Route::prefix('admin')->group(function() {
    Route::get('/appearances', [AppearancesController::class, 'index']);
    Route::get('/appearances/create', [AppearancesController::class, 'create'])->name('appearances.create');
    Route::post('/appearances/store', [AppearancesController::class, 'store'])->name('appearances.store');
});

Route::resource('/appearances/', AppearancesController::class);
