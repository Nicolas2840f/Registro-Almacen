<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;


class ForgotPasswordController extends Controller
{
    public function sendResetLink(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        $user = Usuario::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Usuario no encontrado']);
        }

        $user->reset_code = Str::random(32); // Genera un código aleatorio
        $user->save();

        // Envía el código al usuario por correo, si es necesario
        // Puedes usar Laravel's Mail para hacerlo.

        return redirect()->route('password.verify'); // Redirige a la vista donde el usuario ingresará el código.
    }

    public function resetPassword(Request $request)
{
    $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
        'reset_code' => 'required', // Campo para el código aleatorio.
    ]);

    $user = Usuario::where('email', $request->email)->first();

    if (!$user || $user->reset_code !== $request->reset_code) {
        return back()->withErrors(['email' => 'Código de restablecimiento incorrecto']);
    }

    $user->password = Hash::make($request->password);
    $user->reset_code = null; // Borra el código después de restablecer la contraseña.
    $user->save();

    return redirect()->route('login')->with('status', 'Contraseña restablecida con éxito');
}

}
