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
            'documentoUsuario' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);


        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'password' => __("auth.failed"),
            ]);
        }

        $request->session()->regenerate();
        return redirect()->route('mainView');
    }
}
