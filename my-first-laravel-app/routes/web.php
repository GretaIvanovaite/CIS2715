<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::resource('/', HomeController::class);