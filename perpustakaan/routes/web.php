<?php

use Illuminate\Support\Facades\Route;




Route::view('/','welcome');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/buku/index', [App\Http\Controllers\BukuController::class, 'index'])->name('buku.index');

Route::get('/peminjaman/index', [App\Http\Controllers\PeminjamanController::class, 'index'])->name('Peminjaman.index');