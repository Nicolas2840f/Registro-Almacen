<?php

namespace App\Http\Controllers;

use App\Models\Portatil;
use App\Models\Usuario;
// use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = DB::table("usuarios")->get();

        return view("usuarios.Usuarios", ['usuarios' => $usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function buscarByDocument(Request $request)
    {

        $request->validate([
            'documentoUsuario' => ['required', 'numeric']
        ]);

        $usuario = Usuario::where('documentoUsuario', 'like', '%' . $request->documentoUsuario . '%')->first();
        if (!$usuario) {
            throw ValidationException::withMessages([
                'password' => __("auth.failed"),
            ]);
        }

        $portatiles = Portatil::where('usuario', $usuario->idUsuario)->get();


        if (count($portatiles) > 0) {
            return redirect()->route('RRegistro')->with(['usuario' => $usuario, 'portatiles' => $portatiles]);
        } else {
            return redirect()->route('RRegistro')->with(['usuario' => $usuario, 'message' => 'El usuario no tiene portátiles']);
        }


        // return to_route('RRegistro')->with(['usuario' => $usuario, 'portatiles' => $portatiles]);

    }

}
