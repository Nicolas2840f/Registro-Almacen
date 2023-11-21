<x-layouts.app title="Historial Registro" meta-description="RUD de registros">
    <style>
        /* .comic-box {
            display: none;
            position: absolute;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            top: 50px;
            z-index: 200;
        }

        .comic-text {
            font-family: 'Comic Sans MS', cursive;
            font-size: 16px;
            color: #333;
        }

        .arrow-down {
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 0;
            border-left: 20px solid transparent;
            border-right: 20px solid transparent;
            border-bottom: 20px solid #fff;
        }

        .relative-container {
            position: relative;
        }*/

        span#spanDocumento:hover+.comic-box {
            display: flex;
        }
    </style>

    <body style="background: #075985">
        <div style="height:calc(100% - 4rem);" class="main flex flex-col w-full p-10">
            <div class="title w-full h-[10%] flex items-center justify-center">
                <h1 class="w-full text-4xl text-white">Historial De Registros de entradas y Salidas</h1>
            </div>

            <div class="main2 w-full h-[90%] mt-3 rounded-md px-4 pb-4 pt-3 bg-gray-200">
                <div class="buscar h-[10%] flex flex-row items-center w-full">
                    <input data-id="_token" type="hidden" value="{{ csrf_token() }}">
                    <input name="documentoUsuario" id="DocumentoUsuario" style="width:-webkit-fill-available"
                        class="h-4/5 border shadow-sm px-2" type="number" placeholder="N° Documento">
                    <input id="fechaIngresoRegistro" name="fechaIngresoRegistro"
                        class="w-[30px] h-4/5 text-[30px] flex items-center" type="date">
                </div>
                <div class="tabless w-full h-[90%] max-h-[90%] overflow-auto pt-6">
                    <table class="w-full min-w-full h-fit text-center shadow">
                        <thead class="sticky top-0 bg-gray-300">
                            <tr>
                                <th>Usuario</th>
                                <th>Portatil</th>
                                <th>Fecha Ingreso</th>
                                <th>Fecha Salida</th>
                            </tr>
                        </thead>
                        <tbody id="TBodyRegistros">
                            <tr>
                                <td class="relative grid place-content-center">
                                    <span id="spanDocumento">1101752630</span>
                                    <div
                                        class="comic-box whitespace-nowrap flex flex-col absolute bg-white p-5 shadow-xl max-w-[400px] min-w-fit top-12 z-50">
                                        <div
                                            class="arrow-down absolute -top-5 left-2/4 -translate-x-2/4 w-0 h-0 border-transparent border-solid border-l-[20px] border-r-[20px] border-b-white border-b-[20px]">
                                        </div>
                                        <span class="comic-text bg-green-400 w-fit">
                                            <b>Nombre:</b>
                                            Cristian Fernando Morales Diaz
                                        </span>
                                        <span class="comic-text"><strong>Documento:</strong> _____</span>
                                        <span class="comic-text"><strong>Teléfono:</strong> _____</span>
                                        <span class="comic-text"><strong>Correo:</strong> _____</span>
                                    </div>
                                </td>
                                <td>Hp --- Hp</td>
                                <td>2023-11-17 23:11:56</td>
                                <td>2023-11-17 23:22:09</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
            var csrfToken = "{{ csrf_token() }}";
        </script>
    </body>
</x-layouts.app>

{{-- <div class="usuario absolute  flex flex-col bg-blue-800 top-0">
    <span>
        <strong>nombre:</strong>
        Cristian Morales
    </span>
    <span>
        <strong>Documento:</strong>
        1101752630
    </span>
</div> --}}

{{-- @foreach ($registros as $registro) --}}
{{-- <tr> --}}
{{-- <td>{{ $registro->usuarioR->nombreUsuario }}</td> --}}
{{-- <td>{{ $registro->usuarioR->documentoUsuario }}</td> --}}
{{-- <td>{{ $registro->portatilR->marcaPortatil }} --- --}}
{{-- {{ $registro->portatilR->colorPortatil }}</td> --}}
{{-- <td>{{ $registro->fechaIngresoRegistro }}</td> --}}
{{-- <td>{{ $registro->fechaSalidaRegistro }}</td> --}}
{{-- </tr> --}}
{{-- @endforeach --}}
