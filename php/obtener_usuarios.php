<?php

$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$basededatos = "login_register_db";

$conexion = mysqli_connect("localhost", "root", "", "login_register_db");

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$query = "SELECT dni, nombre, correo FROM clientes";
$result = mysqli_query($conexion, $query);

$output = '';
while ($row = mysqli_fetch_assoc($result)) {
    $output .= '
    <tr>
        <td>' . $row['dni'] . '</td>
        <td>' . $row['nombre'] . '</td>
        <td>' . $row['correo'] . '</td>
        <td>
            <button class="btn btn-warning btnEditar" 
                    data-dni="' . $row['dni'] . '"
                    data-nombre="' . $row['nombre'] . '"
                    data-correo="' . $row['correo'] . '"">Editar</button>
            <button class="btn btn-danger btnEliminar" data-dni="' . $row['dni'] . '">Eliminar</button>
        </td>
    </tr>
    ';
}

echo $output;

mysqli_close($conexion);
?>
