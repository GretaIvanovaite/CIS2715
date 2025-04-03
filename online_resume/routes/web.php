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
Route::get('/skills/', [SkillsController::class, 'index'])->name('skills');
Route::get('/contact/', [ContactController::class, 'index']);
//Route::get('/skills/create', [AdminSkillsController::class, 'create'])->name('skills.create');
//Route::post('/skills/submit', [AdminSkillsController::class, 'store'])->name('skills.store');
Route::prefix('admin')->group(function(){
    Route::get('/skills/create', [AdminSkillsController::class, 'create'])->name('skills.create');
    Route::get('/skills/show', [AdminSkillsController::class, 'index'])->name('skills.show');
    Route::post('/skills/submit', [AdminSkillsController::class, 'store'])->name('skills.store');
    Route::get('/experiences/create', [AdminExperiencesController::class, 'create'])->name('experiences.create');
    Route::post('/experiences/submit', [AdminExperiencesController::class, 'store'])->name('experiences.store');
    Route::get('/skills/{skill}/edit', [AdminSkillsController::class, 'edit'])->name('skills.edit');
    Route::patch('/skills/{skill}', [AdminSkillsController::class, 'update'])->name('skills.update');
    Route::delete('/skills/{skill}', [AdminSkillsController::class, 'destroy'])->name('skills.destroy');
    Route::get('/institutes/show', [AdminInstitutesController::class, 'index'])->name('institutes.show');
});