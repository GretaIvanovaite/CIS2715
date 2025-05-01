<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\QuestionController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/index', [HomeController::class, 'index'])->name('home');
Route::get('/login', [UserController::class, 'index'])->name('login');
Route::get('/signup', [UserController::class, 'create'])->name('signup');

//Route::prefix('user')->group(function(){
//    Route::get('/dashboard', [UserController::class, 'authenticate'])->name('dashboard');
//});

Route::get('/user/dashboard/', [DashboardController::class, 'index'])->name('dashboard');

Route::controller(QuestionnaireController::class)->group(function () {
    Route::get('/questionnaires/create', 'create')->name('questionnaires.create');
    Route::get('/questionnaires/{questionnaire}/edit', 'edit')->name('questionnaires.edit');
    Route::post('/questionnaires/store', 'store')->name('questionnaires.store');
    Route::patch('/questionnaires/update', 'update')->name('questionnaires.update');
    Route::delete('/questionnaires/delete', 'destroy')->name('questionnaires.destroy');
});

Route::controller(QuestionController::class)->group(function () {
    Route::get('/questions/create', 'create')->name('questions.create');
    Route::get('/questions/edit', 'edit')->name('questions.edit');
    Route::post('/questions/store', 'store')->name('questions.store');
    Route::patch('/questions/update', 'update')->name('questions.update');
    Route::delete('/questions/delete', 'destroy')->name('questions.destroy');
});

Route::get('/questionnaires/{questionnaire}', [QuestionnaireController::class, 'show'])->name('questionnaires.show');
