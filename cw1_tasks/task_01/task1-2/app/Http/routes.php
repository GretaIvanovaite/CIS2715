<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AppearancesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MusicController;

Route::resource('/', HomeController::class);
Route::resource('/home', HomeController::class);
Route::resource('/about', AboutController::class);
Route::resource('/appearances', AppearancesController::class);
Route::resource('/contact', ContactController::class);
Route::resource('/music', MusicController::class);