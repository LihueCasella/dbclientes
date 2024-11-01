<?php
session_start();
if (isset($_SESSION['usuario'])) {
    header("location: dashboard.php");
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/estilos.css">
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />

    <title>Logeo y Registro - Base de datos</title>
</head>

<body>
    <main>
        <!--Contenedor de las cajas de login y registro-->
        <div class="contenedor__all">
            <!--Panel trasero de Logeo-->
            <div class="caja__deatras">
                <div class="caja__atraslogin">
                    <h3>
                        ¿ya tienes cuenta?
                        <p>Inicia sesión para entrar en La base de datos</p>
                        <button id="btn__iniciar-sesion" data-bs-toggle="tooltip"
                            title="Ver contraseña" /> Iniciar sesión </button>
                    </h3>
                </div>
                <!--caja de atras de registro-->
                <div class="caja__atraslregistro">
                    <h3>
                        ¿Aún no tienes cuenta?
                        <p>Registrate para poder iniciar sesión</p>
                        <button id="btn__registro" data-bs-toggle="tooltip"
                            title="Ver contraseña" />registrarse</button>
                    </h3>
                </div>
            </div>
            <!--Caja de login y formulario de datos de logeo-->
            <div class="contenedor__login-register">
                <form action="php/login_usuario.php" method="POST" class="formulario__login">
                    <h2>Iniciar sesión</h2>
                    <input type="text" placeholder="Usuario" name="usuario" required>
                    <div class="password-container">
                        <input type="password" placeholder="Contraseña" name="contrasena" id="login_contrasena" required>
                        <button type="button" id="toggleLoginPassword">
                            <img src="assets/botones/boton apagado.png" alt="Mostrar Contraseña" id="loginPasswordIcon" data-bs-toggle="tooltip"
                                title="Ver contraseña" />
                        </button>
                    </div>
                    <button type="submit">Ingresar</button>
                </form>
                <!--caja de registro y formulario de datos de registro-->
                <form action="php/registro_usuarios.php" method="POST" class="formulario__registro" id="registroForm">
                    <h2>Regístrarse</h2>
                    <input type="text" placeholder="Nombre Completo" name="nombre_completo" required>
                    <input type="email" placeholder="Correo Electronico" name="correo" required>
                    <input type="text" placeholder="Usuario" name="usuario" required>
                    <div class="password-container">
                        <input type="password" placeholder="Contraseña" name="contrasena" id="contrasena" required>
                        <button type="button" id="toggleRegisterPassword">
                            <img src="assets/botones/boton apagado.png" alt="Mostrar Contraseña" id="registerPasswordIcon" data-bs-toggle="tooltip"
                                title="Ver contraseña" />
                        </button>
                    </div>
                    <div class="password-container">
                        <input type="password" placeholder="Confirmar Contraseña" name="confirmar_contrasena" id="confirmar_contrasena" required>
                        <button type="button" id="toggleConfirmPassword">
                            <img src="assets/botones/boton apagado.png" alt="Mostrar Contraseña" id="confirmPasswordIcon" data-bs-toggle="tooltip"
                                title="Ver contraseña" />
                        </button>
                    </div>
                    <button type="submit">Regístrarse</button>
                </form>
            </div>
        </div>
    </main>
    <script src="js/scripts.js"></script>
</body>

</html>