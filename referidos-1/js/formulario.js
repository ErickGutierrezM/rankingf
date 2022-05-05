const formulario = document.getElementById('user_form');
const inputs = document.querySelectorAll('#user_form input');

const expresiones = {
    usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    password: /^.{4,12}$/, // 4 a 12 digitos.
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    telefono: /^\d{7,14}$/ // 7 a 14 numeros.
}
const validarFormulario = (e) => {
    switch (e.target.name) {
        case "nombre":
            validarCampo(expresiones.nombre, e.target, 'nombre');
            break;
        case "departamento":
            validarCampo(expresiones.nombre, e.target, 'departamento');
            break;
        case "puesto":
            validarCampo(expresiones.nombre, e.target, 'puesto');
            break;
        case "cliente":
            validarCampo(expresiones.nombre, e.target, 'cliente');
            break;
        case "agencia-cliente":
            validarCampo(expresiones.nombre, e.target, 'agencia-cliente');
            break;
        case "seguimiento":
            validarCampo(expresiones.nombre, e.target, 'seguimiento');
            break;

    }
}
const validarCampo = (expresion, input, campo) => {
    if (expresion.test(input.value)) {
        document.getElementById(`grupo__${campo}`).classList.remove('form-group-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.add('form-group-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');

    } else {
        document.getElementById(`grupo__${campo}`).classList.add('form-group-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.remove('form-group-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
    }
}
inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit', () => {

});