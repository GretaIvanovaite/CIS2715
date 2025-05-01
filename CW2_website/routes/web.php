<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuestionnaireController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/index', [HomeController::class, 'index'])->name('home');
Route::get('/login', [UserController::class, 'index'])->name('login');
Route::get('/signup', [UserController::class, 'create'])->name('signup');

//Route::prefix('user')->group(function(){
//    Route::get('/dashboard', [UserController::class, 'authenticate'])->name('dashboard');
//});

Route::get('/user/dashboard/', [DashboardController::class, 'index'])->name('dashboard');

// Route::get('/questionnaires/{questionnaire}', [QuestionnaireController::class, 'show'])->name('questionnaires.show');

Route::get('/questionnaires/show', [QuestionnaireController::class,'show'])->name('questionnaires.show');

Route::controller(QuestionnaireController::class)->group(function () {
    Route::get('/questionnaires/create', 'create')->name('questionnaires.create');
    Route::get('/questionnaires/edit', 'edit')->name('questionnaires.edit');
    Route::post('/questionnaires/store', 'store')->name('questionnaires.store');
    Route::patch('/questionnaires/update', 'update')->name('questionnaires.update');
    Route::delete('/questionnaires/destroy', 'destroy')->name('questionnaires.destroy');
});
