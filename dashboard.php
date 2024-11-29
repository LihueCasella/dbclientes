<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    echo '
    <script> 
        alert("Inicia Sesión para poder acceder a la página")
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> <!-- Incluir jQuery -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> <!-- Incluir Bootstrap JS -->
</head>
<body>
    <!-- Sidebar -->
    <div class="d-flex">
        <nav class="sidebar bg-dark text-white p-3">
            <h4>Dashboard</h4>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="dashboard.php" class="nav-link text-white">Estadísticas</a></li>
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
                
                <!-- Tabla de Clientes -->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>DNI</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Acción</th>
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

    <!-- Modal para Editar Cliente -->
    <div class="modal fade" id="editarClienteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editarClienteForm">
                        <input type="hidden" id="editDni">
                        <div class="form-group">
                            <label for="editNombre">Nombre:</label>
                            <input type="text" class="form-control" id="editNombre" name="editNombre" required>
                        </div>
                        <div class="form-group">
                            <label for="editEmail">Correo Electrónico:</label>
                            <input type="email" class="form-control" id="editEmail" name="editEmail" required>
                        </div>
                        <div class="form-group">
                            <label for="editTelefono">Número de Teléfono:</label>
                            <input type="text" class="form-control" id="editTelefono" name="editTelefono" required>
                        </div>
                        <div class="form-group">
                            <label for="editDomicilio">Domicilio:</label>
                            <input type="text" class="form-control" id="editDomicilio" name="editDomicilio" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            // Función para cargar clientes desde la base de datos
            function cargarClientes() {
                $.ajax({
                    url: 'php/obtener_usuarios.php',
                    method: 'GET',
                    success: function(response) {
                        $('#clientesTable').html(response);
                    }
                });
            }

            // Cargar clientes al cargar la página
            cargarClientes();

            // Editar Cliente
            $('#clientesTable').on('click', '.btnEditar', function() {
                var dni = $(this).data('dni');
                var nombre = $(this).data('nombre');
                var email = $(this).data('email');
                var telefono = $(this).data('telefono');
                var domicilio = $(this).data('domicilio');

                $('#editDni').val(dni);
                $('#editNombre').val(nombre);
                $('#editEmail').val(email);
                $('#editTelefono').val(telefono);
                $('#editDomicilio').val(domicilio);

                $('#editarClienteModal').modal('show');
            });

            // Guardar Cambios del Cliente
            $('#editarClienteForm').submit(function(e) {
                e.preventDefault();
                var dni = $('#editDni').val();
                var nombre = $('#editNombre').val();
                var email = $('#editEmail').val();
                var telefono = $('#editTelefono').val();
                var domicilio = $('#editDomicilio').val();

                $.ajax({
                    url: 'php/actualizar_usuario.php',
                    method: 'POST',
                    data: {
                        dni: dni,
                        nombre: nombre,
                        email: email,
                        telefono: telefono,
                        domicilio: domicilio
                    },
                    success: function(response) {
                        $('#editarClienteModal').modal('hide');
                        cargarClientes();
                    }
                });
            });

            // Eliminar Cliente
            $('#clientesTable').on('click', '.btnEliminar', function() {
                if (confirm('¿Seguro que deseas eliminar este cliente?')) {
                    var dni = $(this).data('dni');

                    $.ajax({
                        url: 'php/eliminar_usuarios.php',
                        method: 'POST',
                        data: { dni: dni },
                        success: function(response) {
                            cargarClientes();
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
