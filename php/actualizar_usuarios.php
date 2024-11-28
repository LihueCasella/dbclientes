<?php

$servidor = "localhost";
$usuario = "lihue";
$contrasena = "lihue123";
$basededatos = "login_register_db";

$con = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);

if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if (isset($_POST["dni"])) {
    $dni = $_POST["dni"];
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $domicilio = $_POST["domicilio"];

    $query = "UPDATE clientes SET nombre = '$nombre', email = '$email', telefono = '$telefono', domicilio = '$domicilio' WHERE dni = '$dni'";

    if (mysqli_query($con, $query)) {
        echo "Cliente actualizado correctamente.";
    } else {
        echo "Error al actualizar el cliente: " . mysqli_error($con);
    }
}

mysqli_close($con);

?>
