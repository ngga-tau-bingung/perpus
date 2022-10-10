<?php

use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

Route::view('/','welcome');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

/* route pengarang done */
Route::prefix('pengarang')->middleware('auth')->group(function(){
    Route::controller(App\Http\Controllers\PengarangController::class)->group(function(){
        Route::get('/', 'index')->name('pengarang.index');
        Route::get('/create', 'create')->name('pengarang.create');
        Route::post('/create', 'store')->name('pengarang.store');
        Route::get('/{id}/edit', 'edit')->name('pengarang.edit');
        Route::put('/{id}', 'update')->name('pengarang.update');
        Route::delete('/{id}', 'destroy')->name('pengarang.destroy');
    });
});


/* route penerbit done */
Route::prefix('penerbit')->middleware('auth')->group(function(){
    Route::controller(App\Http\Controllers\PenerbitController::class)->group(function(){
        Route::get('/','index')->name('penerbit.index');
        Route::get('/create','create')->name('penerbit.create');
        Route::post('/create','store')->name('penerbit.store');
        Route::get('/{id}/edit','edit')->name('penerbit.edit');
        Route::put('/{id}','update')->name('penerbit.update');
        Route::delete('/{id}','destroy')->name('penerbit.destroy');
    });
});

//route category
Route::prefix('category')->middleware('auth')->group(function(){
    Route::controller(App\Http\Controllers\CategoryController::class)->group(function(){
        Route::get('/','index')->name('category.index');
        Route::post('/create','store')->name('category.store');
        Route::get('/create','create')->name('category.create');
        Route::get('/{id}/edit','show')->name('category.show');
        Route::put('/{id}','update')->name('category.update');
        Route::delete('/{id}','destroy')->name('category.destroy');
    });
});

//route peminjaman
Route::middleware('auth')->group(function(){
    Route::controller(App\Http\Controllers\PeminjamanController::class)->group(function() {
        Route::get('/peminjaman','index')->name('peminjaman.index');
        Route::get('/userpinjam/{id}','userpinjam')->name('peminjaman.userpinjam');
        Route::post('/peminjaman/{book_id}','meminjam')->name('peminjaman.meminjam');
    });
});

/* route admin/user */
Route::prefix('admin')->middleware(['auth','admin'])->group(function(){
    Route::controller(App\Http\Controllers\UserController::class)->group(function(){
        Route::get('/', 'index')->name('admin.index');
        Route::get('/create', 'create')->name('admin.create');
        Route::post('', 'store')->name('admin.store');
        Route::get('/{id}/edit', 'edit')->name('admin.edit');
        Route::put('/{id}', 'update')->name('admin.update');
        Route::delete('/{id}', 'destroy')->name('admin.destroy');
    });
});

//route book
Route::prefix('book')->middleware('auth')->group(function(){
    Route::controller(App\Http\Controllers\BookController::class)->group(function(){
        Route::get('/','index')->name('book.index');
        Route::get('/create','create')->name('book.create');
        Route::post('/create','store')->name('book.store');
        Route::get('/{id}/edit','show')->name('book.show');
        Route::put('/{id}','update')->name('book.update');
        Route::delete('/{id}','destroy')->name('book.destroy');
    });
});

//route pinjam
Route::middleware('auth')->group(function(){
    Route::controller(App\Http\Controllers\PinjamController::class)->group(function(){
        Route::get('/pinjam','index')->name('pinjam.index');
        Route::get('/userpinjam/{id}','userpinjam')->name('pinjam.userpinjam');
        Route::post('/pinjam/{book_id}','meminjam')->name('pinjam.meminjam');
    });
});
