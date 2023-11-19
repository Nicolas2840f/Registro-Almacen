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
