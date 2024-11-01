<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    echo '
    <script> 
        alert("Inicia Sesión para poder aceder a la pagina")
        window.location = "index.php";
    </script>
    ';
    session_destroy();
    die();
}
session_destroy();


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Clientes</title>
    <link rel="stylesheet" href="dashboard/assets/estilo.css">
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />

</head>

<body>
    <div class="nav">
        <ul>
            <li><a href="#" id="cargar-clientes">Cargar Clientes</a></li>
            <li><a href="#" id="ver-deudas">Ver Deudas</a></li>
            <li><a href="php/cerrar_sesion.php">Cerrar Sesión</a></li>
        </ul>
    </div>
    <div class="main-content">
        <h1>Dashboard de Clientes</h1>
        <div id="lista-clientes">
            <h2>Lista de Clientes</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Límite de Crédito</th>
                        <th>Deuda Actual</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="clientes-table-body">
                    <!-- Filas de clientes irán aquí -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Ventana flotante para Cargar Clientes -->
    <div class="modal" id="modal-cargar-clientes">
        <div class="modal-content">
            <span class="close" id="close-cargar-clientes">&times;</span>
            <h2>Agregar Cliente</h2>
            <form id="form-cargar-clientes">
                <input type="text" name="nombre" placeholder="Nombre" required>
                <input type="email" name="email" placeholder="Correo" required>
                <input type="text" name="telefono" placeholder="Teléfono">
                <input type="text" name="direccion" placeholder="Dirección">
                <input type="number" name="limite_credito" placeholder="Límite de Crédito" max="300000" required>
                <button type="submit">Registrar</button>
            </form>
        </div>
    </div>

    <!-- Ventana flotante para Editar Clientes -->
    <div class="modal" id="modal-editar-clientes">
        <div class="modal-content">
            <span class="close" id="close-editar-clientes">&times;</span>
            <h2>Editar Cliente</h2>
            <form id="form-editar-clientes">
                <input type="hidden" name="id" id="edit-id">
                <input type="text" name="nombre" id="edit-nombre" placeholder="Nombre" required>
                <input type="email" name="email" id="edit-email" placeholder="Correo" required>
                <input type="text" name="telefono" id="edit-telefono" placeholder="Teléfono">
                <input type="text" name="direccion" id="edit-direccion" placeholder="Dirección">
                <input type="number" name="limite_credito" id="edit-limite_credito" placeholder="Límite de Crédito" max="300000" required>
                <button type="submit">Guardar Cambios</button>
            </form>
        </div>
    </div>

    <!-- Ventana flotante para Ver Deudas -->
    <div class="modal" id="modal-ver-deudas">
        <div class="modal-content">
            <span class="close" id="close-ver-deudas">&times;</span>
            <h2>Deudas de Clientes</h2>
            <table id="deudas-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Deuda Actual</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="deudas-table-body">
                    <!-- Filas de deudas irán aquí -->
                </tbody>
            </table>
        </div>
    </div>

    <script src="dashboard/app.js"></script>
</body>

</html>