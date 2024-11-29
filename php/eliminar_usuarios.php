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

    $query = "DELETE FROM clientes WHERE dni = '$dni'";

    if (mysqli_query($conexion, $query)) {
        echo "Cliente eliminado correctamente.";
    } else {
        echo "Error al eliminar el cliente: " . mysqli_error($conexion);
    }
}

mysqli_close($conexion);

?>

