<?php

use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengarangController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\CategoryController;

Route::view('/','welcome');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

/* route pengarang done */
Route::prefix('pengarang')->middleware('auth')->group(function(){
    Route::controller(PengarangController::class)->group(function(){
        Route::get('/', 'index')->name('pengarang.index');
        Route::get('/create', 'create')->name('pengarang.create');
        Route::post('/create', 'store')->name('pengarang.store');
        Route::get('/{id}/edit', 'edit')->name('pengarang.edit');
        Route::put('/{id}', 'update')->name('pengarang.update');
        Route::delete('/{id}', 'destroy')->name('pengarang.destroy');
    });
});

Route::get('/buku/index', [App\Http\Controllers\BukuController::class, 'index'])->name('buku.index');

Route::get('/peminjaman/index', [App\Http\Controllers\PeminjamanController::class, 'index'])->name('Peminjaman.index');

/* route penerbit done */
Route::get('/penerbit', [PenerbitController::class, 'index'])->name('penerbit.index');
Route::get('/penerbit/create', [PenerbitController::class, 'create'])->name('penerbit.create');
Route::post('/penerbit/create', [PenerbitController::class, 'store'])->name('penerbit.store');
Route::get('/penerbit/{id}/edit', [PenerbitController::class, 'edit'])->name('penerbit.edit');
Route::put('/penerbit/{id}', [PenerbitController::class, 'update'])->name('penerbit.update');
Route::delete('/penerbit/{id}', [PenerbitController::class, 'destroy'])->name('penerbit.destroy');

//route category
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::post('/category/create', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::get('/category/{id}/edit', [CategoryController::class, 'show'])->name('category.show');
Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

/* route admin users */
Route::resource('admin/users', UsersController::class)->middleware(['auth','admin']);
