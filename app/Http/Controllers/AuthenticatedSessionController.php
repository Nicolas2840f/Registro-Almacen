<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request)
    {

        $credentials = $request->validate([
            'documentoUsuario' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string'],
        ]);


        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'password' => __("auth.failed"),
            ]);
        }
<<<<<<< HEAD
        // if(!Auth::user()->rolUsuario != 1) {
        //     return re
        // }
        if(Auth::user()->rolUsuario == 1){
            return back()->with("status",'No tienes permiso');
        };
        return redirect()->route('mainView');
=======

        if(Auth::user()->rolUsuario == 1){
            return back()->with("status",'No tienes permiso');
        };
        return redirect()->route('main.index')->with('status', 'Iniciaste sesión');
    }


    public function destroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login')->with('status', 'Cerraste sesión correctamente');
>>>>>>> 4fc8dbaedf16577683c3992b978495035854bf6d
    }
}
