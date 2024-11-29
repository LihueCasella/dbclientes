<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargar Usuarios</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="dashboard/assets/estilo.css"> <!-- Archivo CSS personalizado -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>
    <!-- Sidebar -->
    <div class="d-flex">
        <nav class="sidebar bg-dark text-white p-3">
            <h4>Dashboard</h4>
            <ul class="nav flex-column">
            <li class="nav-item"><a href="dashboard.php" class="nav-link text-white"><i class="fas fa-home" style="margin-right: 3px;"></i> Inicio</a></li>
            <li class="nav-item"><a href="clientes.php" class="nav-link text-white"><i class="fas fa-users" style="margin-right: 3px;"></i> Clientes</a></li>

            </ul>
        </nav>
        
        <!-- Main Content -->
        <div class="content p-4">
            <div class="container-fluid">
                <h3>Cargar Usuarios</h3>
                <form action="php/procesar_usuarios.php" method="POST">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido:</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" required>
                    </div>
                    <div class="form-group">
                        <label for="dni">DNI:</label>
                        <input type="text" class="form-control" id="dni" name="dni" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Número de Teléfono:</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" required>
                    </div>
                    <div class="form-group">
                        <label for="domicilio">Domicilio:</label>
                        <input type="text" class="form-control" id="domicilio" name="domicilio" required>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="cuentaCorriente" name="cuentaCorriente">
                        <label class="form-check-label" for="cuentaCorriente">Activar Cuenta Corriente</label>
                    </div>
                    <button type="submit" id="agregar" name="agregar"  class="btn btn-primary">Agregar Usuario</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

