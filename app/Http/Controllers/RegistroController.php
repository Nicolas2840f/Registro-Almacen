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
            ->join('portatiles', 'registros.portatil', '=', 'portatiles.idPortatil')
            ->where('usuarios.' . $request->input, 'like', '%' . $request->value . '%')
            ->get(['registros.*', 'usuarios.*', 'portatiles.*']);

        $html = '';

        if ($registros->count() > 0) {
            foreach ($registros as $registro) {


                //     <td class="relative">
                //     <span id="spanDocumento">1101752630</span>
                //     <div
                //         class="comic-box drop-shadow-2xl left-2/4 -translate-x-2/4 hidden flex-col absolute bg-white p-5 shadow-xl whitespace-nowrap max-w-[600px] min-w-fit top-12 z-50">
                //         <span class="comic-text w-fit text-left">
                //             <b>Nombre:</b> <br>
                //             Cristian Fernando Morales Diaz
                //         </span>
                //         <hr class="border-gray-800 m-1">
                //         <span class="comic-text w-fit text-left">
                //             <b>Documento:</b> <br>
                //             1101752630
                //         </span>
                //         <hr class="border-gray-800 m-1">
                //         <span class="comic-text w-fit text-left">
                //             <b>Correo:</b> <br>
                //             cfmorales.diaz@gmail.com
                //         </span>
                //     </div>
                // </td>

                $html .= '<tr>';
                $html .= '<td class="relative">
                    <span id="spanLabel" class="cursor-pointer">' . $registro->documentoUsuario . '</span>
                    <div
                        class="comic-box drop-shadow-2xl left-2/4 -translate-x-2/4 hidden flex-col absolute bg-white p-5 shadow-xl whitespace-nowrap max-w-[600px] min-w-[250px] top-12 z-50">
                        <span class="comic-text w-fit text-left">
                            <b>Nombre:</b> <br>' .
                    $registro->nombreUsuario .
                    '</span>
                        <hr class="border-gray-800 m-1">
                        <span class="comic-text w-fit text-left">
                            <b>Documento:</b> <br>
                            ' . $registro->documentoUsuario . '
                        </span>
                        <hr class="border-gray-800 m-1">
                        <span class="comic-text w-fit text-left">
                            <b>Correo:</b> <br>
                            ' . $registro->correoUsuario . '
                        </span>
                    </div>
                </td>';

                $html .= '<td class="relative">
                <span id="spanLabel" class="cursor-pointer"> ' . $registro->númeroSeriePortatil . '</span>
                <div
                    class="comic-box min-w-[250px] drop-shadow-2xl left-2/4 -translate-x-2/4 hidden flex-col absolute bg-white p-5 shadow-xl whitespace-nowrap max-w-[600px] top-12 z-50">
                    <div
                        class="arrow-down absolute -top-5 left-2/4 -translate-x-2/4 w-0 h-0 border-transparent border-solid border-l-[20px] border-r-[20px] border-b-white border-b-[20px]">
                    </div>
                    <span class="comic-text w-fit text-left">
                        <b>Marca:</b> <br>
                        ' . $registro->marcaPortatil . '
                    </span>
                    <hr class="border-gray-800 m-1">
                    <span class="comic-text w-fit text-left">
                        <b>Color:</b> <br>
                        ' . $registro->colorPortatil . '
                    </span>
                    <hr class="border-gray-800 m-1">
                    <span class="comic-text w-fit text-left">
                        <b>Especificaciones:</b> <br>
                        ' . $registro->especificacionesPortatil . '
                    </span>
                </div>
            </td>';
                $html .= '<td>' . $registro->fechaIngresoRegistro . '</td>';
                $html .=  '<td>' . $registro->fechaSalidaRegistro . '</td>';
                $html .= '</tr>';



                // $html .= '<tr>';

                //     $html .= '<td class="relative">';
                //         $html .= '<span id="spanLabel">'. $registro->documentoUsuario . '</span>';
                //         $html .= '<div class="comic-box drop-shadow-2xl left-2/4 -translate-x-2/4 hidden flex-col absolute bg-white p-5 shadow-xl whitespace-nowrap max-w-[600px] min-w-fit top-12 z-50">';
                //             $html .= '<div class="arrow-down absolute -top-5 left-2/4 -translate-x-2/4 w-0 h-0 border-transparent border-solid border-l-[20px] border-r-[20px] border-b-white border-b-[20px]"></div>';
                //             $html .= ;
                //         $html .= '</div';
                //     $html .= '</td>';

                //     $html .= '<td class="relative">' . $registro->marcaPortatil . ' --- ' . $registro->marcaPortatil . '</td>';
                //     $html .= '<td>' . $registro->fechaIngresoRegistro . '</td>';
                //     $html .= '<td>' . $registro->fechaSalidaRegistro . '</td>';
                // $html .= '</tr>';
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
