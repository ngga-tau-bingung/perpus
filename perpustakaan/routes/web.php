<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengarangController;

Route::view('/','welcome');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//route pengarang
Route::get('/pengarang', [PengarangController::class, 'index'])->name('pengarang.index');

Route::get('/buku/index', [App\Http\Controllers\BukuController::class, 'index'])->name('buku.index');

Route::get('/peminjaman/index', [App\Http\Controllers\PeminjamanController::class, 'index'])->name('Peminjaman.index');