<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $posts = Post::with('user')->latest()->paginate(10, page: $request->integer('page', 1));

        return view('pages.home', compact('posts'));
    }
}
