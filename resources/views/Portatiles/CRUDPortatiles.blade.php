<x-layouts.app title="Portatiles" meta-description="CRUD para Portatiles">

    <body style="background: #075985">
        <div style="height: calc(100% - 4rem)" class="flex justify-center items-center">
            <h1 class="text-6xl">Portatiles</h1>
            <form action="{{ route('portatil.store') }}" method="POST">
                @csrf
                <input type="text" placeholder="marca del portatil" name="marcaPortatil"
                    value="{{ old('marcaPortatil') }}">
                @error('marcaPortatil')
                    {{ $message }}
                @enderror
                <input type="text" placeholder="especificaciones del portatil" name="especificacionesPortatil"
                    value="{{ old('especificacionesPortatil') }}">
                @error('especificacionesPortatil')
                    {{ $message }}
                @enderror
                <input type="text" placeholder="color del portatil" name="colorPortatil"
                    value="{{ old('colorPortatil') }}">
                @error('colorPortatil')
                    {{ $message }}
                @enderror
                <input type="number" placeholder="Documento del dueño" name="usuario">
                @error('usuario')
                    {{ $message }}
                @enderror
                <button type="submit">Enviar</button>
            </form>
        </div>
    </body>
</x-layouts.app>
