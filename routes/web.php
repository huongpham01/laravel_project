<?php

use App\Http\Controllers\Auth\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Users\LoginController;
use App\Http\Controllers\Auth\Users\RegisterController;




Route::prefix('users')
  ->name('user.')
  ->group(function () {
    // LOGIN
    Route::get('/login', [LoginController::class, 'index'])->name('get.login');
    Route::post('/login', [LoginController::class, 'store'])->name('post.login');
    //REGISTER
    Route::get('/register', [RegisterController::class, 'index'])->name('get.register');
    Route::post('/register', [RegisterController::class, 'store'])->name('post.register');
    //Logout
    Route::get('/logout', [LoginController::class, 'logout'])->name('get.logout');
  });

Route::get('/auth/main', [MainController::class, 'index'])->name('main');
