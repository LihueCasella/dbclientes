

//eventos que accionan las funciones
document.getElementById("btn__registro").addEventListener("click", register)
document.getElementById("btn__iniciar-sesion").addEventListener("click", iniciarSesion)
//variables a declarar
var contenedor_login_register = document.querySelector(".contenedor__login-register");
var formulario_login = document.querySelector(".formulario__login");
var formulario_registro = document.querySelector(".formulario__registro");
var caja__atraslogin = document.querySelector(".caja__atraslogin");
var caja__atraslregistro = document.querySelector(".caja__atraslregistro");

//función de logeo a la base de datos

function iniciarSesion() {
    formulario_registro.style.display = "none";
    contenedor_login_register.style.left = "10px";
    formulario_login.style.display = "block";
    caja__atraslregistro.style.opacity = "1";
    caja__atraslogin.style.opacity = "0";
}

//función de registro a la base de datos
function register() {
    formulario_registro.style.display = "block";
    contenedor_login_register.style.left = "410px";
    formulario_login.style.display = "none";
    caja__atraslregistro.style.opacity = "0";
    caja__atraslogin.style.opacity = "1";
}










