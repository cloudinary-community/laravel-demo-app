<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Post $post, Request $request)
    {
        $post->load('user');
        $post->load('comments.user');

        return view('pages.post', compact('post'));
    }
}
