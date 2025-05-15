<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;



// Halaman awal
Route::get('/', function () {
    return view('welcome');
});

// Dashboard (autentikasi + verifikasi email)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Group route untuk semua user yang login
Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Todo routes
    Route::resource('todo', TodoController::class)->except('show');
    Route::patch('/todo/{todo}/complete', [TodoController::class, 'complete'])->name('todo.complete');
    Route::patch('/todo/{todo}/uncomplete', [TodoController::class, 'uncomplete'])->name('todo.uncomplete');
    Route::delete('/todo', [TodoController::class, 'destroyCompleted'])->name('todo.deletecompleted');

    // Category routes (sesuai UCP1)
    Route::resource('categories', CategoryController::class)->except('show');

    //Route::resource('/category', CategoryController::class);
});

// Group route khusus untuk admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('user', UserController::class)->except('show');
    Route::get('/user/{id}', [UserController::class, 'show'])->name('users.show');
    Route::patch('/user/{user}/makeadmin', [UserController::class, 'makeadmin'])->name('user.makeadmin');
    Route::patch('/user/{user}/removeadmin', [UserController::class, 'removeadmin'])->name('user.removeadmin');
});

// Route auth default dari Laravel Breeze/Fortify
require __DIR__ . '/auth.php';
