<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengarangController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\CategoryController;

Route::view('/','welcome');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//route pengarang
Route::get('/pengarang', [PengarangController::class, 'index'])->name('pengarang.index');
Route::post('/pengarang/create', [PengarangController::class, 'store'])->name('pengarang.store');
Route::get('/pengarang/{id}', [PengarangController::class, 'show'])->name('pengarang.show');
Route::put('/pengarang/{id}', [PengarangController::class, 'update'])->name('pengarang.update');
Route::delete('/pengarang/{id}', [PengarangController::class, 'destroy'])->name('pengarang.destroy');

Route::get('/buku/index', [App\Http\Controllers\BukuController::class, 'index'])->name('buku.index');

Route::get('/peminjaman/index', [App\Http\Controllers\PeminjamanController::class, 'index'])->name('Peminjaman.index');

//route penerbit
Route::get('/penerbit', [PenerbitController::class, 'index'])->name('penerbit.index');
Route::post('/penerbit/create', [PenerbitController::class, 'store'])->name('penerbit.store');
Route::get('/penerbit/{id}', [PenerbitController::class, 'show'])->name('penerbit.show');
Route::put('/penerbit/{id}', [PenerbitController::class, 'update'])->name('penerbit.update');
Route::delete('/penerbit/{id}', [PenerbitController::class, 'destroy'])->name('penerbit.destroy');

//route category
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::post('/category/create', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');