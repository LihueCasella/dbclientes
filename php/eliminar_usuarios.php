<?php

$servidor = "localhost";
$usuario = "Lihue";
$contrasena = "lihue123";
$basededatos = "login_register_db";

$con = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);

if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if (isset($_POST["dni"])) {
    $dni = $_POST["dni"];

    $query = "DELETE FROM clientes WHERE dni = '$dni'";

    if (mysqli_query($con, $query)) {
        echo "Cliente eliminado correctamente.";
    } else {
        echo "Error al eliminar el cliente: " . mysqli_error($con);
    }
}

mysqli_close($con);

?>

