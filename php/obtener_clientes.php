<?php

$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$basededatos = "login_register_db";

$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$query = "SELECT dni, nombre, correo, telefono, domicilio, deuda_minima, deuda_maxima FROM clientes";
$result = mysqli_query($conexion, $query);

$output = '';
while ($row = mysqli_fetch_assoc($result)) {
    $output .= '
    <tr>
        <td>' . $row['dni'] . '</td>
        <td>' . $row['nombre'] . '</td>
        <td>' . $row['correo'] . '</td>
        <td>' . $row['telefono'] . '</td>
        <td>' . $row['domicilio'] . '</td>
        <td>' . $row['deuda_minima'] . '</td>
        <td>' . $row['deuda_maxima'] . '</td>
        <td>
            
        </td>
    </tr>
    ';
}

echo $output;

mysqli_close($conexion);
?>

