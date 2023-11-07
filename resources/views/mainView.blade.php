<x-layouts.app title="MainView" meta-description="MainView">
    {{ Auth::user()->rolUsuario }} ---- {{ Auth::user()->rol->descripcionRol }}
    <br>
    {{ Auth::user()->tipoDocumentoUsuario }} ---- {{ Auth::user()->tipoDocumento->descripcionTipoDocumento }}




    {{ Auth::user() }}
</x-layouts.app>
