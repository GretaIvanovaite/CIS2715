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

Route::get('/questionnaires/show', [QuestionnaireController::class, 'show'])->name('questionnaires.show');

Route::controller(QuestionnaireController::class)->group(function () {
    Route::get('/questionnaires/create', 'create')->name('questionnaire.create');
    Route::get('/questionnaires/edit', 'edit')->name('questionnaire.edit');
    Route::post('/questionnaires/submit', 'store')->name('questionnaires.submit');
    Route::patch('/questionnaires/update', 'update')->name('questionnaire.update');
    Route::delete('/questionnaires/destroy', 'destroy')->name('questionnaire.destroy');
});
