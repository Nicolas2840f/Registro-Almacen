<x-layouts.app title="MainView" meta-description="MainView">

    <body style="background: #075985">
        <div style="height: calc(100% - 4rem)" class="flex justify-center items-center">
            <h1 class="text-6xl">Bienvenido/a {{ Auth::user()->nombreUsuario }}</h1>
        </div>
    </body>
</x-layouts.app>
