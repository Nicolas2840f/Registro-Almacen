<x-layouts.app title="Registro de Entradas" meta-description="Registro de Entradas">

    <body style="background: #075985">
        {{-- <div style="height: calc(100% - 4rem)" class="flex justify-center items-center">
            <h1 class="text-6xl">Usuarios</h1>
        </div> --}}

        <ul>
            @foreach ($usuarios as $usuario)
                <li><strong>{{ $usuario->idUsuario }}. </strong>{{ $usuario->nombreUsuario }}</li>
            @endforeach
        </ul>
    </body>
</x-layouts.app>