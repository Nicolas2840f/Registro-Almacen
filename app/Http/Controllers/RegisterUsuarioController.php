<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

class RegisterUsuarioController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'fTipoDocumento' => ['required', 'string'],
            'fDocumento' => ['required', 'string', 'min:7', 'unique:usuarios,documentoUsuarios'],
            'fNombre' => ['required', 'string', 'max:100'],
            'fTelefono' => ['required', 'string', 'max:10', 'min:10'],
            'fCorreo' => ['required', 'string', 'email'],
            'fPassword' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


        User::create([
            'tipoDocumentoUsuarios' => $request->fTipoDocumento,
            'documentoUsuarios' => $request->fDocumento,
            'nombreUsuarios' => $request->fNombre,
            'telefonoUsuarios' => $request->fTelefono,
            'correoUsuarios' => $request->fCorreo,
            'passwordUsuarios' => bcrypt($request->fPassword),
        ]);

        return to_route('login');

        // return $request;

    }
}
