<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request)
    {

        $credentials = $request->validate([
            'documentoUsuarios' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);
<<<<<<< HEAD


=======
>>>>>>> 3b1ead381db3ddf696fe737d41e1488fb9036a24
        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'password' => __("auth.failed"),
            ]);
        }

        $request->session()->regenerate();
<<<<<<< HEAD
        return redirect()->route('mainView');
=======
        return redirect()->intended(route('mainView'));
>>>>>>> 3b1ead381db3ddf696fe737d41e1488fb9036a24
    }
}
