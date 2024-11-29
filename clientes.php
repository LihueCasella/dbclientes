<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    echo '
    <script> 
        alert("Inicia Sesión para poder acceder a la página")
        window.location = "index.php";
    </script>
    ';
    die();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="dashboard/assets/estilo.css"> <!-- Archivo CSS personalizado -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Incluir Chart.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> <!-- Incluir jQuery -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> <!-- Incluir Bootstrap JS -->
</head>
<body>
    <!-- Sidebar -->
    <div class="d-flex">
        <nav class="sidebar bg-dark text-white p-3">
            <h4>Dashboard</h4>
            <ul class="nav flex-column">
            <li class="nav-item"><a href="dashboard.php" class="nav-link text-white"><i class="fas fa-home" style="margin-right: 3px;"></i> Inicio</a></li>
            <li class="nav-item"><a href="cargar_usuarios.php" class="nav-link text-white"><i class="fas fa-user-plus" style="margin-right: 3px;"></i> Cargar Usuarios</a></li>
            <li class="nav-item mt-auto"><a href="logout.php" class="nav-link text-white"><i class="fas fa-sign-out-alt" style="margin-right: 3px;"></i> Cerrar Sesión</a></li>

            </ul>
        </nav>

        <!-- Main Content -->
        <div class="content p-4">
            <div class="container-fluid">
                <h2>Lista de Clientes</h2>
                <!-- Barra de Búsqueda -->
                <input class="form-control mb-4" id="searchInput" type="text" placeholder="Buscar clientes...">

                <!-- Tabla de Clientes -->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>DNI</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Teléfono</th>
                                <th>Domicilio</th>
                                <th>Deuda Mínima</th>
                                <th>Deuda Máxima</th>
                            </tr>
                        </thead>
                        <tbody id="clientesTable">
                            <!-- Aquí se cargarán los clientes desde la base de datos -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            // Función para cargar clientes desde la base de datos
            function cargarClientes() {
                $.ajax({
                    url: 'php/obtener_clientes.php',
                    method: 'GET',
                    success: function(response) {
                        $('#clientesTable').html(response);
                    }
                });
            }

            // Cargar clientes al cargar la página
            cargarClientes();

            // Función para filtrar clientes en la tabla
            $('#searchInput').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $('#clientesTable tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>
</html>
