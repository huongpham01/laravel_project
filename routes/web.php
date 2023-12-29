<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Users\AuthController;
use App\Http\Controllers\UserController;

Route::prefix('users')
  ->name('user.')
  ->group(function () {
    // LOGIN
    Route::get('/login', [AuthController::class, 'login'])->name('get.login');
    Route::post('/login', [AuthController::class, 'loginUser'])->name('post.login');
    //REGISTER
    Route::get('/register', [AuthController::class, 'registation'])->name('get.register');
    Route::post('/register', [AuthController::class, 'registerUser'])->name('post.register');
    //LOGOUT
    Route::get('/logout', [AuthController::class, 'logout'])->name('get.logout');

    // Edit user route
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
    //Update user after edit
    Route::put('/{id}', [UserController::class, 'update'])->name('update');

    // Delete user route
    Route::delete('/{id}', [UserController::class, 'delete'])->name('delete');

    //Sort column
    Route::get('/sort', [UserController::class, 'sort'])->name('sort');

    //DASHBOARD
    Route::get('/', [UserController::class, 'index'])->name('index');
  });
