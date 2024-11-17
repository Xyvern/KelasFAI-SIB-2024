<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
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


// Route::get('/barang', [BarangController::class, 'index'])->name('barang');
// Route::post('/barang', [BarangController::class, 'insert'])->name('barang.insert');
// Route::put('/barang', [BarangController::class, 'update'])->name('barang.update');
// Route::delete('/barang', [BarangController::class, 'delete'])->name('barang.delete');
// Route::patch('/barang', [BarangController::class, 'delete'])->name('barang.insert');

Route::prefix('admin')->group(function () {
    Route::prefix('barang')->group(function () {
        Route::get('/', [BarangController::class, 'index'])->name('barang');
        Route::get('/update/{id}', [BarangController::class, 'update'])->name('barang.update');
        Route::post('', [BarangController::class, 'insert'])->name('barang.insert');
        Route::put('/{id}', [BarangController::class, 'doUpdate'])->name('barang.doUpdate');
        Route::delete('/{id}/{stat}', [BarangController::class, 'delete'])->name('barang.delete');
    });
    Route::prefix('kategori')->group(function () {
        Route::get('/', [KategoriController::class, 'index'])->name('kategori');
        Route::get('/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
        Route::post('', [KategoriController::class, 'insert'])->name('kategori.insert');
        Route::put('/{id}', [KategoriController::class, 'doUpdate'])->name('kategori.doUpdate');
        Route::delete('/{id}/{stat}', [KategoriController::class, 'delete'])->name('kategori.delete');
    });
});
