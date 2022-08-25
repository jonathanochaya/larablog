<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => $this->getPosts(),
            'categories' => Category::all(),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function getPosts()
    {
        return Post::with('category', 'author')
            ->orderBy('updated_at', 'desc')
            ->filter(request(['search', 'category', 'author']))->get();
    }
}
