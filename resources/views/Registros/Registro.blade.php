<x-layouts.app title="Registro de Entradas" meta-description="Registro de Entradas">

    <body style="background: #075985">
        {{-- <div style="height: calc(100% - 64px)" class="flex justify-center items-center">
            <h1 class="text-6xl">Registro registros</h1>
        </div> --}}
        <div style="height: calc(100% - 64px)" class="h-full flex items-center justify-center">
            <div class="bg-blue-700 flex flex-col p-8 rounded-xl w-1/4 h-1/3">
                <form class="flex flex-col" action="{{ route('buscar') }}" method="POST">
                    @csrf
                    <div class="w-full flex flex-row">
                        <input class="w-3/4" id="DocumentoUsuario" name="documentoUsuario" type="text">
                        <button class="bg-gray-600 ml-3 w-1/4">enviar</button>
                    </div>
                    <label class="flex flex-row">
                        <strong>Nombre:</strong> &nbsp;
                        <p>{{ session('usuario') ? session('usuario.nombreUsuario') : '_____' }}</p>
                    </label>
                    <label class="flex flex-row">
                        <strong>Documento:</strong>&nbsp;
                        <p>{{ session('usuario') ? session('usuario.documentoUsuario') : '_____' }}</p>
                    </label>
                    <label>
                        @if (session('message'))
                            <div class="message">
                                <small>{{ session('message') }}, <a href="{{ route('CRUDPortatiles') }}">Agregar</a></small>
                            </div>
                        @endif

                        @if (isset($portatiles) && count($portatiles) > 0)
                            <select name="portatilUsuario" id="PortatilUsuario">
                                @foreach ($portatiles as $portatil)
                                    <option value="{{ $portatil->idPortatil }}">{{ $portatil->marcaPortatil }} --
                                        {{ $portatil->colorPortatil }}</option>
                                @endforeach
                            </select>

                            <div class="buttons">
                                <button>Salida</button>
                                <button>Entrada</button>
                            </div>

                        @endif


                    </label>
                </form>
            </div>
        </div>

        <script>
            var input = document.getElementById('DocumentoUsuario')
            var formulario = document.getElementById('Formulario')
            input.addEventListener('keydown', function(evt) {
                if (evt === 'enter') {
                    evt.preventDefault()
                    formulario.submit()
                }
            })
        </script>
    </body>
</x-layouts.app>
