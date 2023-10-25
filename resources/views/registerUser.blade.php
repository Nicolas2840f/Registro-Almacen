<x-layouts.app title="Register" meta-description="Register">

    <body style="background: #075985">
        <div class="w-full flex justify-center">
            <div class="table w-1/3 bg-sky-600 text-center my-20 rounded-md shadow-xl shadow-slate-950/50">
                <h1 class="titulo-principal text-slate-50">Register</h1>
                <div class="w-full flex justify-center">
                    <form action ="{{ route('usuario.store') }}" method="POST">
                        @csrf
                        <input class="w-5/6 p-3 rounded-md m-2 focus:outline-none caja" type="text"
                            placeholder="Nombre" name="nombreUsuario" value="{{ old('nombreUsuario') }}">
                        @error('nombreUsuario')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                        <select class="w-5/6 p-3 rounded-md m-2 focus:outline-none caja" name="tipoDocumentoUsuario"
                            id="" value="{{ old('tipoDocumentoUsuario') }}">
                            @foreach ($tipoDocumentos as $tipoDocumento)
                                <option value="{{ $tipoDocumento->idTipoDocumento }}">
                                    {{ $tipoDocumento->descripcionTipoDocumento }}</option>
                            @endforeach
                        </select>
                        <input class="w-5/6 p-3 rounded-md m-2 focus:outline-none caja" type="number"
                            placeholder="Identificación" name="documentoUsuario" value="{{ old('documentoUsuario') }}">
                        @error('documentoUsuario')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                        <input class="w-5/6 p-3 rounded-md m-2 focus:outline-none caja" type="number"
                            placeholder="Telefono" name="telefonoUsuario" value="{{ old('telefonoUsuario') }}">
                        @error('telefonoUsuario')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                        <input class="w-5/6 p-3 rounded-md m-2 focus:outline-none caja" type="mail"
                            placeholder="Correo" name="correoUsuario" value="{{ old('correoUsuario') }}">
                        @error('correoUsuario')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                        <input class="w-5/6 p-3 rounded-md m-2 focus:outline-none caja" type="Password"
                            placeholder="Contraseña" name="password">
                        @error('password')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                        <input class="w-5/6 p-3 rounded-md m-2 focus:outline-none caja" type="Password"
                            placeholder="confirmar contraseña" name="password_confirmation">
                        <button
                            class="w-5/6 p-3 rounded-md m-2 bg-sky-200 font-medium hover:text-slate-50 hover:bg-sky-800"
                            type="submit">Login</button>
                        <div class="w-full text-slate-50 links">
                            <a href="{{ route('reset') }}" class="hover:underline hover:text-sky-100">¿Perdiste tu
                                Contraseña?</a>
                        </div>
                        <div class="w-full pb-12 text-slate-50 links">
                            <a href="{{ route('login') }}" class="hover:text-sky-100">¿Ya tienes Cuenta?
                                <label style="cursor: pointer" class="hover:underline">Iniciar Sesion</label>
                            </a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </body>
</x-layouts.app>
