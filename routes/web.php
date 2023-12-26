<?php

use App\Http\Controllers\Admin\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;

Route::get('/admin/users/login', [LoginController::class, 'index']);
Route::post('/admin/users/login/store', [LoginController::class, 'store']);

Route::get('/admin/main', [MainController::class, 'index'])->name('admin');
