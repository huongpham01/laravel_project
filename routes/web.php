<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Users\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\HomeController;

// HOME PAGE
Route::get("/home", [HomeController::class, "index"])->name('home.index')->middleware('auth');

// USER
Route::prefix('users')
  ->name('user.')
  ->group(function () {
    // LOGIN
    Route::get('/login', [AuthController::class, 'login'])->name('get.login');
    Route::post('/login', [AuthController::class, 'loginUser'])->name('post.login');
    //REGISTER
    Route::get('/register', [AuthController::class, 'registation'])->name('get.register');
    Route::post('/register', [AuthController::class, 'registerUser'])->name('post.register');

    Route::middleware(['auth'])->group(function () {

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
  });

// NEWS
Route::prefix('reviews')
  ->name('review.')
  ->group(function () {
    Route::middleware(['auth'])->group(function () {
      Route::get('/', [ReviewController::class, 'index'])->name('index');
      Route::get('/create', [ReviewController::class, 'create'])->name('get.create');
      Route::post('/create', [ReviewController::class, 'createReview'])->name('post.create');
      Route::post('/image-upload', [ReviewController::class, 'imageUploadPost'])->name('post.upload');
      Route::get('/{id}/view', [ReviewController::class, 'view'])->name('view');
      Route::get('/{id}/edit', [ReviewController::class, 'edit'])->name('edit');
      Route::put('/{id}/update', [ReviewController::class, 'update'])->name('update');
      // Route::post('/{id}/update', [ReviewController::class, 'update'])->name('update');
      Route::delete('/{id}', [ReviewController::class, 'delete'])->name('delete');
    });
  });
