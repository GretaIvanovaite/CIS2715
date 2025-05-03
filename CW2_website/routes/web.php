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
    Route::get('/questionnaires/edit/{questionnaire}', 'edit')->name('questionnaires.edit');
    Route::post('/questionnaires/store', 'store')->name('questionnaires.store');
    Route::patch('/questionnaires/update/{questionnaire}', 'update')->name('questionnaires.update');
    Route::patch('/questionnaires/status/{questionnaire}', 'status')->name('questionnaires.status');
    Route::delete('/questionnaires/delete/{questionnaire}', 'destroy')->name('questionnaires.destroy');
});
Route::get('/questionnaires/{questionnaire}', [QuestionnaireController::class, 'show'])->name('questionnaires.show');

Route::controller(QuestionController::class)->group(function () {
    Route::get('{questionnaire}/questions/create/', 'create')->name('questions.create');
    Route::get('/questions/edit/{question}', 'edit')->name('questions.edit');
    Route::post('/questions/store', 'store')->name('questions.store');
    Route::patch('/questions/update/{question}', 'update')->name('questions.update');
    Route::delete('/questions/delete/{question}', 'destroy')->name('questions.destroy');
});

Route::controller(OptionController::class)->group(function () {
    Route::get('/questionOptions/create/{question}', 'create')->name('options.create');
    Route::get('/questionOptions/edit/{question}', 'edit')->name('options.edit');
    Route::post('/questionOptions/store', 'store')->name('options.store');
    Route::patch('/questionOptions/update/{questionOption}', 'update')->name('options.update');
    Route::delete('/questionOptions/delete/{questionOption}', 'destroy')->name('options.destroy');
});

Route::controller(ColumnValueController::class)->group(function () {
    Route::get('/columns/create/{question}', 'create')->name('columns.create');
    Route::get('/columns/edit/{question}', 'edit')->name('columns.edit');
    Route::post('/columns/store', 'store')->name('columns.store');
    Route::patch('/columns/update/{columnValue}', 'update')->name('columns.update');
    Route::delete('/columns/delete/{columnValue}', 'destroy')->name('columns.destroy');
});

Route::controller(RangeSliderController::class)->group(function () {
    Route::get('/range/create/{question}', 'create')->name('range.create');
    Route::get('/range/edit/{rangeSlider}', 'edit')->name('range.edit');
    Route::post('/range/store', 'store')->name('range.store');
    Route::patch('/range/update/{rangeSlider}', 'update')->name('range.update');
    Route::delete('/range/delete/{rangeSlider}', 'destroy')->name('range.destroy');
});


