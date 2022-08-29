<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show'])->where('post', '[A-Za-z_\-]+')->name('post');
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store'])->middleware('auth')->name('comment');

Route::get('register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth')->name('logout');

Route::post('newsletter', NewsletterController::class)->name('newsletter');

Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware('admin')->name('adminposts');
Route::post('admin/posts', [AdminPostController::class, 'store'])->middleware('admin')->name('savepost');
Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware('admin')->name('newpost');
Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware('admin')->name('editpost');
Route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])->middleware('admin')->name('updatepost');
Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy'])->middleware('admin')->name('deletepost');
