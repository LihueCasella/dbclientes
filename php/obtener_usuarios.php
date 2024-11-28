<?php

$servidor = "localhost";
$usuario = "Lihue";
$contrasena = "lihue123";
$basededatos = "login_register_db";

$con = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);

if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$query = "SELECT dni, nombre, email FROM usuarios";
$result = mysqli_query($con, $query);

$output = '';
while ($row = mysqli_fetch_assoc($result)) {
    $output .= '
    <tr>
        <td>' . $row['dni'] . '</td>
        <td>' . $row['nombre'] . '</td>
        <td>' . $row['email'] . '</td>
        <td>
            <button class="btn btn-warning btnEditar" 
                    data-dni="' . $row['dni'] . '"
                    data-nombre="' . $row['nombre'] . '"
                    data-email="' . $row['email'] . '"
                    data-telefono="' . $row['telefono'] . '"
                    data-domicilio="' . $row['domicilio'] . '">Editar</button>
            <button class="btn btn-danger btnEliminar" data-dni="' . $row['dni'] . '">Eliminar</button>
        </td>
    </tr>
    ';
}

echo $output;

mysqli_close($con);
?>
