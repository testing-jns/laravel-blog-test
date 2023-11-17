<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::permanentRedirect('/post', '/posts');
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/post/{post:slug}', [PostController::class, 'show'])->name('post');

Route::permanentRedirect('/category', '/posts');
// Route::get('/category/{category:slug}', [CategoryController::class, 'show'])->name('category');
Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category');

Route::permanentRedirect('/author', '/authors');
Route::get('/authors', [AuthorController::class, 'index'])->name('authors');
Route::get('/author/{author:username}', [AuthorController::class, 'show'])->name('author');
