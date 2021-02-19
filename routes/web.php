<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategorieController;


Route::GET('/', [LoginController::class, 'login'])->name('login');
Route::POST('/login/access', [LoginController::class, 'access'])->name('login.access');
Route::POST('/login/verify', [LoginController::class, 'verify_user'])->name('login.verify');
Route::POST('/login/register', [LoginController::class, 'register_user'])->name('login.register');


Route::GET('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
Route::GET('/categories', [CategorieController::class, 'categories'])->name('categories');
