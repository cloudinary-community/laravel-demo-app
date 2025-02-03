<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required',
            'remember' => 'nullable',
        ]);

        if (auth()->attempt($request->only('email', 'password'), $request->has('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
