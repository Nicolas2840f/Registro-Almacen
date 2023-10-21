<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request)
    {
        $credentials = $request->validate(
            [
                'documentoUsuarios' => ['required', 'string', 'min:7'],
                'passwordUsuarios' => ['required', 'string'],
            ]
        );

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('mainView'))
                ->with('status', 'Ingresado con Éxito');
        } else {
            throw ValidationException::withMessages([
                'documentoUsuarios' => 'El documento no se encuentra registrado en nuestro sistema'
            ]);
        }
    }
}
