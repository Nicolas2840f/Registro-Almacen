<x-layouts.app title="Roles" meta-description="Registro y modificación de roles">

    <body style="background: #075985">
        <div style="height: calc(100% - 4rem)" class="flex justify-center items-center">
            <h1 class="text-6xl">Roles</h1>
            <form action="{{ route('rol.store') }}" method="POST">
                @csrf
                <input type="text" name="descripcionRol" placeholder="Descripcion del rol">
                <button type="submit">Insertar</button>

            </form>
            <table class="table-fixed border">

                <tr>
                    <td>Id</td>
                    <td>Descripción</td>
                    <td>Opción</td>
                </tr>
                @foreach ($roles as $rol)
                    <tr>
                        <form action="{{ route('rol.update') }}" method="POST">
                            @csrf
                            <td><input type="number" value="{{ $rol->idRol }}" name="idRol" readonly></td>
                            <td><input type="text" value="{{ $rol->descripcionRol }}" name="descripcion"></td>
                            <td>
                                <button class="bg-slate-50" type="submit">Modificar</button>
                        </form>
                        <form action="{{ route('rol.destroy',$rol->idRol) }}" method="POST">
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
