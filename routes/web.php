<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|Pone
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::permanentRedirect('/post', '/posts');
Route::controller(PostController::class)->group(function () {
    Route::get('/posts', 'index')->name('posts');
    Route::get('/post/{post:slug}', 'show')->name('post');
});


Route::permanentRedirect('/category', '/posts');
// Route::get('/category/{category:slug}', [CategoryController::class, 'show'])->name('category');
Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category');


Route::permanentRedirect('/author', '/authors');
Route::controller(AuthorController::class)->group(function () {
    Route::get('/authors', 'index')->name('authors');
    Route::get('/author/{author:username}', 'show')->name('author');
});


Route::middleware('guest')->group(function () {
    Route::controller(SignupController::class)->group(function () {
        Route::get('/signup', 'create')->name('signup');
        Route::post('/signup', 'store');
    });

    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'index')->name('login');
        Route::post('/login', 'authenticate');
    });
});


Route::middleware('auth')->group(function () {
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
