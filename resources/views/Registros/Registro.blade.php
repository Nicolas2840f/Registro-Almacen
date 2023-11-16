<x-layouts.app title="Registro de Entradas" meta-description="Registro de Entradas">

    <body style="background: #075985">
        {{-- <div style="height: calc(100% - 64px)" class="flex justify-center items-center">
            <h1 class="text-6xl">Registro registros</h1>
        </div> --}}
        <div style="height: calc(100% - 64px)" class="h-full flex flex-col items-center justify-center p-8">
            <div class="h-[8%] w-full mb-7 flex flex-row items-center content-start">
                <h1 class="w-full text-4xl text-white tracking-wide">Registro Entrada Y Salida</h1>
            </div>
            <div class="main bg-white w-[100%] h-[90%] rounded-2xl p-5">
                <div class="w-full h-[10%] flex items-center content-center">
                    <form class="w-full h-4/5 flex items-center" action="{{ route('buscar') }}" method="POST">
                        @csrf
                        <div class="flex flex-row h-4/5 w-full">
                            <input class="h-full border w-[90%] rounded px-3 focus:outline"
                                placeholder="Número de Documento" name="documentoUsuario" type="search">
                            <button
                                class="ml-6 bg-blue-500 w-[5%] text-xl hover:bg-blue-600 hover:text-white">🔍</button>
                        </div>
                    </form>
                </div>

                <div class="flex flex-row w-full pt-5 h-[90%]">
                    <div class="mr-7 shadow-2xl w-[35%] h-fit">
                        <form class="w-full h-fit flex flex-col p-2" action="" method="POST">
                            @csrf
                            <?php
                            $usuario = session('usuario');
                            ?>
                            <input readonly class="h-8 rounded-sm border focus:outline read-only:outline-none"
                                type="hidden" value="{{ $usuario ? $usuario->documentoUsuario : '' }}">
                            <label for="">Nombre: </label>
                            <input readonly class="mt-2 h-8 rounded-sm border focus:outline read-only:outline-none"
                                type="text" value="{{ $usuario ? $usuario->nombreUsuario : '' }}"
                                placeholder="Nombre Usuario">
                            <label for="">Documento: </label>
                            <input readonly class="mt-2 h-8 rounded-sm border focus:outline read-only:outline-none"
                                type="text" value="{{ $usuario ? $usuario->documentoUsuario : '' }}"
                                placeholder="Documento Usuario">
                            <label for="">Correo: </label>
                            <input readonly class="mt-2 h-8 rounded-sm border focus:outline read-only:outline-none"
                                type="text" value="{{ $usuario ? $usuario->email : '' }}"
                                placeholder="Correo Usuario">
                            @if (session('message') || session('portatiles'))
                                <label for="">Portatil: </label>
                            @endif

                            @if (session('portatiles'))
                                <select name="portatilUsuario" id="PortatilUsuario">
                                    @foreach (session('portatiles') as $portatil)
                                        <option value="{{ $portatil->idPortatil }}">{{ $portatil->marcaPortatil }} --
                                            {{ $portatil->colorPortatil }}</option>
                                    @endforeach
                                </select>
                            @endif

                            @if (session('message'))
                                <span>
                                    El usuario No tiene Portatil,
                                    <a class="text-blue-500 underline hover:text-blue-700"
                                        href="{{ route('create.portatil.user', $usuario) }}">Registrar?</a>
                                </span>
                            @endif

                            <div class="buttons mt-6 flex flex-row justify-between">
                                <button
                                    class="text-lg bg-blue-500 p-2 w-[48%] rounded-md hover:bg-blue-700 hover:text-white">Salida</button>
                                <button
                                    class="text-lg bg-blue-500 p-2 w-[48%] rounded-md hover:bg-blue-700 hover:text-white">Entrada</button>
                            </div>
                        </form>
                    </div>

                    <div
                        class="contenedor__tabla relative bg-white h-fit max-h-full w-[65%] overflow-auto p-2 rounded-lg border">
                        <table class="w-full border-collapse text-center">
                            <thead class="sticky bg-slate-50 top-[-9px]">
                                <tr>
                                    <th>Usuario</th>
                                    <th>Portatil</th>
                                    <th>Fecha Entrada</th>
                                    <th>Fecha Salida</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (session('registros'))
                                    @foreach (session('registros') as $registro)
                                    <tr>
                                        <td>{{ $registro->usuarioR->nombreUsuario }}</td>
                                        <td>{{ $registro->portatilR->marcaPortatil . " -- " . $registro->portatilR->colorPortatil}}</td>
                                        <td>{{ $registro->fechaIngresoRegistro }}</td>
                                        <td>{{ $registro->fechaSalidaRegistro }}</td>
                                    </tr>

                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4">No hay resultados</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </body>
</x-layouts.app>
