<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Attribute;

class PostCommentsController extends Controller
{
    public function store(Post $post)
    {
        $attributes = request()->validate([
            'body' => ['required']
        ]);

        $post->comments()->create([
            'user_id' => auth()->id(),
            ...$attributes,
        ]);

        return back()->with('message', 'Comment posted');
    }
}
