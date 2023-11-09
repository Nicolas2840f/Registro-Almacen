<x-layouts.app title="MainView" meta-description="MainView">
    <div>
        <div>
            <form action="" method="post">
                @csrf
                <input type="search">
                <input type="hidden">
                <span><Strong>Nombre: </Strong>Cristian Morales</span>
                <span><Strong>Documento: </Strong>1101752630</span>
                <span><Strong>Entrada: </Strong>Null</span>
                <span><strong>Salida: </strong>Null</span>

                <div>
                    <button>Entrada</button>
                    <button>Salida</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
