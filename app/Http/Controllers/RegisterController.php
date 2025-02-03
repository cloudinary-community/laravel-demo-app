<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required|string|same:password',
        ]);

        $user = User::create($data);

        auth()->login($user);

        return redirect()->route('home');
    }
}
