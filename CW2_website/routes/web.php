<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\ColumnValueController;
use App\Http\Controllers\RangeSliderController;
use App\Http\Controllers\ResponseController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/index', [HomeController::class, 'index'])->name('home');
Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/authenticate', [UserController::class, 'authenticate'])->name('authenticate');
Route::get('/signup', [UserController::class, 'signup'])->name('signup');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth')->name('logout');

Route::prefix('user')->middleware(['auth', 'role:user'])->group(function(){
    Route::get('/dashboard/', [DashboardController::class, 'index'])->name('dashboard');
});


Route::controller(QuestionnaireController::class)->middleware(['auth', 'role:user'])->group(function () {
    Route::get('/questionnaires/create', 'create')->name('questionnaires.create');
    Route::post('/questionnaires/store', 'store')->name('questionnaires.store');
    Route::get('/questionnaires/edit/{questionnaire}', 'edit')->name('questionnaires.edit');
    Route::patch('/questionnaires/update/{questionnaire}', 'update')->name('questionnaires.update');
    Route::patch('/questionnaires/status/{questionnaire}', 'status')->name('questionnaires.status');
    Route::delete('/questionnaires/delete/{questionnaire}', 'destroy')->name('questionnaires.destroy');
});
    Route::get('/questionnaires/view/{questionnaire}', [QuestionnaireController::class, 'show'])->name('questionnaires.show');

Route::controller(QuestionController::class)->middleware(['auth', 'role:user'])->group(function () {
    Route::get('/questionnaires/{questionnaire}/questions/create/', 'create')->name('questions.create');
    Route::post('/questionnaires/{questionnaire}/questions/store', 'store')->name('questions.store');
    Route::get('/questionnaires/{questionnaire}/questions/{question}/edit/', 'edit')->name('questions.edit');
    Route::patch('/questionnaires/{questionnaire}/questions/{question}/update/', 'update')->name('questions.update');
    Route::delete('/questionnaires/{questionnaire}/questions/{question}/delete/', 'destroy')->name('questions.destroy');
});

Route::controller(OptionController::class)->middleware(['auth', 'role:user'])->group(function () {
    Route::get('/questionnaires/{questionnaire}/questions/{question}/questionOptions/create/', 'create')->name('options.create');
    Route::post('/questionnaires/{questionnaire}/questions/{question}/questionOptions/store', 'store')->name('options.store');
    Route::get('/questionnaires/{questionnaire}/questions/{question}/questionOptions/edit/{option}', 'edit')->name('options.edit');
    Route::patch('/questionnaires/{questionnaire}/questions/{question}/questionOptions/update/{option}', 'update')->name('options.update');
    Route::delete('/questionnaires/{questionnaire}/questions/{question}/questionOptions/delete/{option}', 'destroy')->name('options.destroy');
    Route::get('/questionnaires/{questionnaire}/questions/{question}/questionOptions/show/', 'show')->name('options.show');
});

Route::controller(ColumnValueController::class)->middleware(['auth', 'role:user'])->group(function () {
    Route::get('/questionnaires/{questionnaire}/questions/{question}/columnValues/create', 'create')->name('columns.create');
    Route::post('/questionnaires/{questionnaire}/questions/{question}/columnValues/store', 'store')->name('columns.store');
    Route::get('/questionnaires/{questionnaire}/questions/{question}/columnValues/edit/{columnValue}', 'edit')->name('columns.edit');
    Route::patch('/questionnaires/{questionnaire}/questions/{question}/columnValues/update/{columnValue}', 'update')->name('columns.update');
    Route::delete('/questionnaires/{questionnaire}/questions/{question}/columnValues/delete/{columnValue}', 'destroy')->name('columns.destroy');
    Route::get('/questionnaires/{questionnaire}/questions/{question}/columnValues/show/', 'show')->name('columns.show');
});

Route::controller(RangeSliderController::class)->middleware(['auth', 'role:user'])->group(function () {
    Route::get('/questionnaires/{questionnaire}/questions/{question}/range/create', 'create')->name('range.create');
    Route::post('/questionnaires/{questionnaire}/questions/{question}/range/store', 'store')->name('range.store');
    Route::get('/questionnaires/{questionnaire}/questions/{question}/range/edit/{range}', 'edit')->name('range.edit');
    Route::patch('/questionnaires/{questionnaire}/questions/{question}/range/update/{range}', 'update')->name('range.update');
    Route::delete('/questionnaires/{questionnaire}/questions/{question}/range/delete/{range}', 'destroy')->name('range.destroy');
});

Route::get('/questionnaires/view/{questionnaire}/store', [ResponseController::class, 'store'])->name('responses.store');


