<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        auth()->logout();

        session()->regenerate();

        return redirect('/');
    }
}
