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
        return redirect()->route('mainView')->with('status', __("auth.login"));
=======
        // if(!Auth::user()->rolUsuario != 1) {
        //     return re
        // }
        if(Auth::user()->rolUsuario == 1){
            return back()->with("status",'No tienes permiso');
        };
        return redirect()->route('mainView');
>>>>>>> 6512aa09c6d5f91bacf429b165e74ef1492da772
    }
}
