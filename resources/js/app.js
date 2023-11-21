import './bootstrap';
const formulario = document.forms["fLogin"];
const documento = document.getElementById("fDocumento");
const password = document.getElementById("fPassword");



var button = document.querySelector('.button')
var ventana = document.querySelector('.ventana')
// var


button.addEventListener('click', () => {
    button.classList.toggle('active')
    ventana.classList.toggle('active')
})


var input = document.getElementById('DocumentoUsuario')
var TBodyRegistros = document.getElementById('TBodyRegistros')
var fechaIngresoRegistro = document.getElementById('fechaIngresoRegistro')


input.addEventListener('input', function () {
    realizarBusqueda(input);
});

fechaIngresoRegistro.addEventListener('input', function () {
    realizarBusqueda(fechaIngresoRegistro);
});

function realizarBusqueda(input) {

    var _token = document.querySelector('[data-id=_token]')
    var valorABuscar = input.value;

    var xhr = new XMLHttpRequest();

    xhr.open('POST', '/Registro/buscar', true);
    xhr.setRequestHeader('X-CSRF-TOKEN', _token.value)
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 300) {

            var registros = JSON.parse(xhr.responseText);

            TBodyRegistros.innerHTML = registros
        } else {
            console.error('Error en la solicitud. Código de estado: ' + xhr.status);
        }
    };

    // Puedes enviar datos en el cuerpo de la solicitud
    var data = 'input=' + encodeURIComponent(input.name) + '&value=' + encodeURIComponent(valorABuscar);
    xhr.send(data);

}

realizarBusqueda(input)
