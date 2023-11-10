    <div style="width: calc(100% - 16.6666% - 3%)" class="w-full h-full flex items-center text-lg">
        <ul class="w-full h-full ml-8 flex justify-evenly items-center">
            <a class="hover:text-blue-600 {{ request()->routeIs('RRegistro') ? 'text-blue-600' : 'text-black' }}"
                href="{{ route('RRegistro') }}">Entrada</a>
            <a class="hover:text-blue-600 {{ request()->routeIs('HRegistro') ? 'text-blue-600' : 'text-black' }}"
                href="{{ route('HRegistro') }}">Historial entradas</a>
            <a class="hover:text-blue-600 {{ request()->routeIs('CRUDPortatiles') ? 'text-blue-600' : 'text-black' }}"
                href="{{ route('CRUDPortatiles') }}">Portatiles</a>
            @if (Auth::user()->rolUsuario == 3)
                <a class="hover:text-blue-600 {{ request()->routeIs('Usuarios') ? 'text-blue-600' : 'text-black' }}"
                    href="{{ route('Usuarios') }}">Usuarios</a>
                <a class="hover:text-blue-600 {{ request()->routeIs('Foraneas') ? 'text-blue-600' : 'text-black' }}"
                    href="">Foraneas</a>
            @endif
        </ul>
    </div>
