<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutMeController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminSkillsController;
use App\Http\Controllers\AdminExperiencesController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/about/', [AboutMeController::class, 'index']);
Route::get('/skills/', [SkillsController::class, 'index']);
Route::get('/contact/', [ContactController::class, 'index']);
//Route::get('/skills/create', [AdminSkillsController::class, 'create'])->name('skills.create');
//Route::post('/skills/submit', [AdminSkillsController::class, 'store'])->name('skills.store');
Route::prefix('admin')->group(function(){
    Route::get('/skills/create', [AdminSkillsController::class, 'create'])->name('skills.create');
    Route::post('/skills/submit', [AdminSkillsController::class, 'store'])->name('skills.store');
    Route::get('/experiences/create', [AdminExperiencesController::class, 'create'])->name('experiences.create');
    Route::post('/experiences/submit', [AdminExperiencesController::class, 'store'])->name('experiences.store');
});