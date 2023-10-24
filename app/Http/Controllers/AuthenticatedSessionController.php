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
            'documentoUsuarios' => ['required', 'string', 'min:7'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return view('mainView', ['user' => Auth::user()])
                ->with('status', 'Ingresado con Éxito');
        } else {
            throw ValidationException::withMessages([
                'documentoUsuarios' => __("auth.failed")
            ]);
        }
    }
}
