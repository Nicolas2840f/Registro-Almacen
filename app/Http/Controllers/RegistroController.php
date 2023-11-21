<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registros = Registro::all();
        return view('Registros.index', ['registros' => $registros]);
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
        $request->validate([
            'idUsuario' => ['required', 'int'],
            'portatil' => ['required'],
        ]);

        $lastRegistro = Registro::latest()->first();

        if ($lastRegistro && $lastRegistro->fechaSalidaRegistro == null) {
            return redirect()->route('registro.create')->withErrors([
                'documentoUsuario' => 'No hay registro de ultima salida',
            ]);
        }

        Registro::create([
            'usuario' => $request->idUsuario,
            'portatil' => $request->portatil,
            'fechaIngresoRegistro' => NOW(),
        ]);

        return to_route('registro.create')->with('status', 'Ingreso Registrado');

    }

    public function buscarByDocument(Request $request)
    {


        $registros = Registro::join('usuarios', 'registros.usuario', '=', 'usuarios.idUsuario')
            ->join('portatiles','registros.portatil','=','portatiles.idPortatil')
            ->where('usuarios.' . $request->input, 'like', '%' . $request->value . '%')
            ->get(['registros.*', 'usuarios.*', 'portatiles.*']);

        $html = '';

        if ($registros->count() > 0) {
            foreach ($registros as $registro) {
                $html .= '<tr>';

                $html .= '<td>' . $registro->nombreUsuario . '</td>';
                $html .= '<td>' . $registro->marcaPortatil . ' --- ' . $registro->marcaPortatil . '</td>';
                $html .= '<td>' . $registro->fechaIngresoRegistro . '</td>';
                $html .= '<td>' . $registro->fechaSalidaRegistro . '</td>';
                $html .= '</tr>';
            }
        } else {
            $html .= '<tr>';
            $html .= '<td colspan="4">No results</td>';
            $html .= '</tr>';
        }

        return json_encode($html, JSON_UNESCAPED_UNICODE);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
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
    public function update(Request $request)
    {

        // return "hola";

        $validated = $request->validate([
            'idUsuario' => ['required', 'int'],
            'portatil' => ['required'],
        ]);

        $lastRegistro = Registro::latest()->first();

        if ($lastRegistro && $lastRegistro->fechaIngresoRegistro != null && $lastRegistro->fechaSalidaRegistro != null) {
            return redirect()->route('registro.create')->withErrors([
                'documentoUsuario' => 'No hay registro de ingreso',
            ]);
        }

        $lastRegistro->update([
            "fechaSalidaRegistro" => NOW(),
        ]);

        return to_route('registro.create')->with('status', 'Salida Registrada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
