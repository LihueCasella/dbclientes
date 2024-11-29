<?php

$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$basededatos = "login_register_db";

$conexion = mysqli_connect("localhost", "root", "", "login_register_db");

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if (isset($_POST["dni"])) {
    $dni = $_POST["dni"];
    $nombre = $_POST["nombre"];
    $email = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $domicilio = $_POST["domicilio"];

    $query = "UPDATE clientes SET nombre = '$nombre', email = '$correo', telefono = '$telefono', domicilio = '$domicilio' WHERE dni = '$dni'";

    if (mysqli_query($conexion, $query)) {
        echo "Cliente actualizado correctamente.";
    } else {
        echo "Error al actualizar el cliente: " . mysqli_error($conexion);
    }
}

mysqli_close($conexion);

?>
