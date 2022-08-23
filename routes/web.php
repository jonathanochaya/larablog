<?php

use Illuminate\Support\Facades\Route;

use App\Models\{ Post, Category, User };

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

Route::get('/', function () {

    return view('posts', [
        'posts' => Post::with('category', 'author')->orderBy('updated_at', 'desc')->get()
    ]);

});


Route::get('categories/{category:slug}', function(Category $category) {

    return view ('posts', [
        'posts' => $category->posts->load('author', 'category')
    ]);

})->where('category', '[A-Za-z_\-]+')->name('category');


Route::get('posts/{post:slug}', function(Post $post) {

    return view('post', [
        'post' => $post
    ]);

})->where('post', '[A-Za-z_\-]+')->name('post');


Route::get('authors/{author:username}', function(User $author) {

    return view('posts', [
        'posts' => $author->posts->load('author', 'category')
    ]);

})->where('author', '[0-9.A-Za-z_\-]+')->name('author');
