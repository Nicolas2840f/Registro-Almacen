<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
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
            'fTelefono' => ['required', 'string', 'max:10', 'min:10','unique:usuarios,telefonoUsuarios'],
            'fCorreo' => ['required', 'string', 'email','unique:usuarios,correoUsuarios'],
            'password' => ['required', 'confirmed'],
        ]);


        Usuario::create([
            'tipoDocumentoUsuarios' => $request->fTipoDocumento,
            'documentoUsuarios' => $request->fDocumento,
            'nombreUsuarios' => $request->fNombre,
            'telefonoUsuarios' => $request->fTelefono,
            'correoUsuarios' => $request->fCorreo,
            'password' => bcrypt($request->password),
        ]);

        return to_route('login');

        // return $request;

    }
}
