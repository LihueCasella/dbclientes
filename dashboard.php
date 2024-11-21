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
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="dashboard/assets/estilo.css"> <!-- Archivo CSS personalizado -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Incluir Chart.js -->
</head>
<body>
    <!-- Sidebar -->
    <div class="d-flex">
        <nav class="sidebar bg-dark text-white p-3">
            <h4>Dashboard</h4>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="index.html" class="nav-link text-white">Estadísticas</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white">Usuarios</a></li>
                <li class="nav-item"><a href="cargar_usuarios.php" class="nav-link text-white">Cargar Usuarios</a></li>
            </ul>
        </nav>
        
        <!-- Main Content -->
        <div class="content p-4">
            <div class="container-fluid">
                <!-- Tarjetas de estadísticas con gráficos -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Usuarios Activos</h5>
                                <canvas id="activeUsersChart" height="200"></canvas> <!-- Gráfico de usuarios activos -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Ventas</h5>
                                <canvas id="salesChart" height="200"></canvas> <!-- Gráfico de ventas -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Ganancias</h5>
                                <canvas id="profitsChart" height="200"></canvas> <!-- Gráfico de ganancias -->
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Tabla de ejemplo -->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php include 'data.php'; ?> <!-- Incluye datos dinámicos de PHP -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="dashboard/scripts.js"></script>

</body>
</html>