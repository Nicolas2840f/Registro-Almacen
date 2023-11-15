<x-layouts.app title="Registro de Entradas" meta-description="Registro de Entradas">

    <style>
        .custom-dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-header {
            background-color: #f0f0f0;
            padding: 10px;
            cursor: pointer;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #fff;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            opacity: 0;
            /* Inicialmente, el menú tiene una opacidad de 0 */
            transform: translateY(-20px);
            /* Inicialmente, el menú está desplazado hacia arriba */
            transition: transform 0.3s, opacity 0.3s;
            /* Agregar transiciones para transform y opacidad */
        }

        .custom-dropdown.open .dropdown-content {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .dropdown-content a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #333;
            transition: background-color 0.3s;
        }

        .dropdown-content a:hover {
            background-color: #f0f0f0;
        }
    </style>

    <body style="background: #075985">

        <div class="custom-dropdown">
            <div class="dropdown-header" onclick="toggleDropdown()">Seleccionar</div>
            <div class="dropdown-content" id="dropdownContent">
                <a href="#">Opción 1</a>
                <a href="#">Opción 2</a>
                <a href="#">Opción 3</a>
            </div>
        </div>

        {{-- <div style="height: calc(100% - 4rem)" class="flex justify-center items-center">
            <h1 class="text-6xl">Usuarios</h1>
        </div> --}}

        {{-- <ul>
            @foreach ($usuarios as $usuario)
                <li><strong>{{ $usuario->idUsuario }}. </strong>{{ $usuario->nombreUsuario }}</li>
            @endforeach
        </ul> --}}

        <script>
            function toggleDropdown() {
                var dropdown = document.querySelector(".custom-dropdown");
                dropdown.classList.toggle("open");
            }

            document.addEventListener("click", function(event) {
                var dropdown = document.querySelector(".custom-dropdown");
                var header = document.querySelector('.dropdown-header');
                if (event.target !== header && !dropdown.contains(event.target)) {
                    dropdown.classList.remove("open");
                }
            });
        </script>
    </body>
</x-layouts.app>
