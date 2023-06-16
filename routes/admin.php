<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Auth::routes();

Route::middleware(['auth', 'admin'])->group(function () {

    Route::view('/', 'home')->name('home');

    Route::prefix('posts')->middleware('auth')->as('posts.')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::post('/store', [PostController::class, 'store'])->name('store');
        Route::get('/edit/{post}', [PostController::class, 'edit'])->name('edit');
        Route::post('/update', [PostController::class, 'update'])->name('update');
        Route::post('/delete/{post}', [PostController::class, 'delete'])->name('delete');
    });

    Route::prefix('users')->middleware('auth')->as('users.')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
        Route::post('/update', [UserController::class, 'update'])->name('update');
        Route::post('/delete/{user}', [UserController::class, 'delete'])->name('delete');
    });

});


