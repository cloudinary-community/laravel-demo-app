<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $user, Request $request)
    {
        $user->load('posts');

        return view('pages.profile', compact('user'));
    }
}
