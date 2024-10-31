document.getElementById("btn__registro").addEventListener("click", register);
document.getElementById("btn__iniciar-sesion").addEventListener("click", iniciarSesion);

var contenedor_login_register = document.querySelector(".contenedor__login-register");
var formulario_login = document.querySelector(".formulario__login");
var formulario_registro = document.querySelector(".formulario__registro");
var caja__atraslogin = document.querySelector(".caja__atraslogin");
var caja__atraslregistro = document.querySelector(".caja__atraslregistro");

function iniciarSesion() {
    formulario_registro.style.display = "none";
    contenedor_login_register.style.left = "10px";
    formulario_login.style.display = "block";
    caja__atraslregistro.style.opacity = "1";
    caja__atraslogin.style.opacity = "0";
}

function register() {
    formulario_registro.style.display = "block";
    contenedor_login_register.style.left = "410px";
    formulario_login.style.display = "none";
    caja__atraslregistro.style.opacity = "0";
    caja__atraslogin.style.opacity = "1";
}

document.querySelector('.formulario__registro').addEventListener('submit', function (event) {
    const contraseña = document.getElementById('contrasena').value;
    const confirmarContraseña = document.getElementById('confirmar_contrasena').value;

    const regex = /^(?=.*[A-Z])(?=.*\d).{8,}$/;

    if (!regex.test(contraseña)) {
        alert('La contraseña debe tener al menos 8 caracteres, incluir una mayúscula y un número.');
        event.preventDefault();
    } else if (contraseña !== confirmarContraseña) {
        alert('Las contraseñas no coinciden.');
        event.preventDefault();
    }
});

// Función para mostrar/ocultar contraseña y cambiar la imagen del botón
function togglePassword(id, iconId) {
    const passwordField = document.getElementById(id);
    const icon = document.getElementById(iconId);
    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordField.setAttribute('type', type);
    icon.src = type === 'password' ? 'assets/botones/boton apagado.png' : 'assets/botones/boton encendidop.png';
}

document.getElementById('toggleLoginPassword').addEventListener('click', function () {
    togglePassword('login_contrasena', 'loginPasswordIcon');
});

document.getElementById('toggleRegisterPassword').addEventListener('click', function () {
    togglePassword('contrasena', 'registerPasswordIcon');
});

document.getElementById('toggleConfirmPassword').addEventListener('click', function () {
    togglePassword('confirmar_contrasena', 'confirmPasswordIcon');
});















