<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CreatePostController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'image' => 'required|file|image',
        ]);

        $request->user()->posts()->create([
            'description' => $request->get('description'),
            'image' => Storage::putFile('posts', $request->file('image')),
        ]);

        return redirect()->route('home');
    }
}
