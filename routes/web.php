<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\NewsletterController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Gate;
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

Route::controller(SessionController::class)->group(function() {
    Route::get('login', 'create')->middleware('guest')->name('login');
    Route::post('login', 'store')->middleware('guest');
    Route::post('logout', 'destroy')->middleware('auth')->name('logout');
});

Route::controller(AdminPostController::class)
    ->middleware('can:admin')
    ->prefix('admin/posts')
    ->group(function() {
    Route::get('/', 'index')->name('adminposts');
    Route::post('/', 'store')->name('savepost');
    Route::get('/create', 'create')->name('newpost');
    Route::get('/{post}/edit', 'edit')->name('editpost');
    Route::patch('/{post}', 'update')->name('updatepost');
    Route::delete('/{post}', 'destroy')->name('deletepost');
});

Route::get('register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::post('newsletter', NewsletterController::class)->name('newsletter');
