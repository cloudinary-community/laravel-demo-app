<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CreateCommentController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Post $post, Request $request)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $post->comments()->create([
            'user_id' => auth()->user()->id,
            'body' => $request->body,
        ]);

        return redirect()->route('post', $post);
    }
}
