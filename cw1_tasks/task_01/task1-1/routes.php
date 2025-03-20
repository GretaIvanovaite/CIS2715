<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/music', function () {
    return view('music');
});

Route::get('/appearances', function () {
    return view('appearances');
});

Route::get('/contact', function () {
    return view('contact');
});