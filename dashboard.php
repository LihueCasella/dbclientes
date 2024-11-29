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
    <title>Dashboard</title>
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
            <li class="nav-item"><a href="clientes.php" class="nav-link text-white"><i class="fas fa-users" style="margin-right: 3px;"></i> Clientes</a></li>
            <li class="nav-item"><a href="cargar_usuarios.php" class="nav-link text-white"><i class="fas fa-solid fa-user-plus" style="margin-right: 3px;"></i> Cargar Clientes</a></li>
            <!-- Botón de Cerrar Sesión -->
            <li class="nav-item mt-auto"><a href="php/cerrar_sesion.php" class="nav-link text-white"><i class="fas fa-sign-out-alt" style="margin-right: 3px;"></i> Cerrar Sesión</a></li>

            </ul>
        </nav>
        
        <!-- Main Content -->
        <div class="content p-4">
            
            <div class="container-fluid">
                <!-- Tabla de Usuarios -->
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
                        <tbody id="usuariosTable">
                            <!-- Aquí se cargarán los usuarios desde la base de datos -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Editar Usuario -->
    <div class="modal fade" id="editarUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editarUsuarioForm">
                        <input type="hidden" id="editDni">
                        <div class="form-group">
                            <label for="editNombre">Nombre:</label>
                            <input type="text" class="form-control" id="editNombre" name="editNombre" required>
                        </div>
                        <div class="form-group">
                            <label for="editCorreo">Correo Electrónico:</label>
                            <input type="email" class="form-control" id="editCorreo" name="editCorreo" required>
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
            // Función para cargar usuarios desde la base de datos
            function cargarUsuarios() {
                $.ajax({
                    url: 'php/obtener_usuarios.php',
                    method: 'GET',
                    success: function(response) {
                        $('#usuariosTable').html(response);
                    }
                });
            }

            // Cargar usuarios al cargar la página
            cargarUsuarios();

            // Editar Usuario
            $('#usuariosTable').on('click', '.btnEditar', function() {
                var dni = $(this).data('dni');
                var nombre = $(this).data('nombre');
                var correo = $(this).data('correo');
                var telefono = $(this).data('telefono');
                var domicilio = $(this).data('domicilio');

                $('#editDni').val(dni);
                $('#editNombre').val(nombre);
                $('#editCorreo').val(correo);
                $('#editTelefono').val(telefono);
                $('#editDomicilio').val(domicilio);

                $('#editarUsuarioModal').modal('show');
            });

            // Guardar Cambios del Usuario
            $('#editarUsuarioForm').submit(function(e) {
                e.preventDefault();
                var dni = $('#editDni').val();
                var nombre = $('#editNombre').val();
                var correo = $('#editCorreo').val();
                var telefono = $('#editTelefono').val();
                var domicilio = $('#editDomicilio').val();

                console.log("Datos enviados:", {dni, nombre, correo, telefono, domicilio}); // Añadir esta línea para verificar datos

                $.ajax({
                    url: 'php/actualizar_usuarios.php',
                    method: 'POST',
                    data: {
                        dni: dni,
                        nombre: nombre,
                        correo: correo,
                        telefono: telefono,
                        domicilio: domicilio
                    },
                    success: function(response) {
                        if(response == 'Cliente actualizado correctamente.') {
                            $('#editarUsuarioModal').modal('hide');
                            cargarUsuarios();
                        } else {
                            alert('Error al actualizar el usuario: ' + response);
                        }
                    }
                });
            });

            // Eliminar Usuario
            $('#usuariosTable').on('click', '.btnEliminar', function() {
                if (confirm('¿Seguro que deseas eliminar este usuario?')) {
                    var dni = $(this).data('dni');

                    $.ajax({
                        url: 'php/eliminar_usuarios.php',
                        method: 'POST',
                        data: { dni: dni },
                        success: function(response) {
                            cargarUsuarios();
                        }
                    });
                }
            });
        });

        // Función para mostrar/ocultar sidebar
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('sidebar-collapsed');
            document.querySelector('.content').classList.toggle('content-expanded');
        }
    </script>
</body>
</html>


