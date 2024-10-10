<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/halo', [SiteController::class, 'index']);
Route::get('/home', [SiteController::class, 'home']);
Route::get('/about', [SiteController::class, 'about']);

// Route::get('/home', [SiteController::class, 'home']);



Route::get('/setcookie', [SiteController::class, 'setCookie']);
Route::get('/getcookie', [SiteController::class, 'getCookie']);

Route::get('/setsession', [SiteController::class, 'setSession']);
Route::get('/getsession', [SiteController::class, 'getSession']);
