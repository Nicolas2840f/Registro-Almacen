<x-layouts.app title="Registro de Entradas" meta-description="Registro de Entradas">
    <body style="background: #075985">
        <div style="height: calc(100% - 4rem)" class="flex justify-center items-center">
            <h1 class="text-6xl">Tipo de Documentos</h1>
            <form action="{{ route('tipoDocumento.store') }}" method="POST">
                @csrf
                <input type="text" name="descripcionTipoDocumento" placeholder="Descripcion del tipo de documento">
                <button type="submit">Insertar</button>

            </form>
            <table class="table-fixed border">

                <tr>
                    <td>Id</td>
                    <td>Descripción</td>
                    <td>Opción</td>
                </tr>
                @foreach ($tipoDocumentos as $tipoDocumento)
                    <tr>
                        <form action="{{ route('tipoDocumento.update') }}" method="POST">
                            @csrf
                            <td><input type="number" value="{{ $tipoDocumento->idTipoDocumento}}" name="idTipoDocumento" readonly></td>
                            <td><input type="text" value="{{ $tipoDocumento->descripcionTipoDocumento}}" name="descripcion"></td>
                            <td>
                                <button class="bg-slate-50" type="submit">Modificar</button>
                        </form>
                        <form action="{{ route('tipoDocumento.destroy',$tipoDocumento->idTipoDocumento) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-slate-50" type="submit">Eliminar</button>
                        </form>
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>
    </body>
</x-layouts.app>
