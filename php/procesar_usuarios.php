<?php

$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$basededatos = "login_register_db";

$con = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);

if (isset($_POST["agregar"])) {
  $nombre = $_POST["nombre"];
  $apellido = $_POST["apellido"];
  $dni = $_POST["dni"];
  $email = $_POST["email"];
  $telefono = $_POST["telefono"];
  $domicilio = $_POST["domicilio"];

  //agregar la lógica para insertar estos datos en la base de datos o cualquier otra operación

  $insertarDatos = "INSERT INTO clientes VALUES ('$nombre','$apellido','$dni','$email','$telefono','$domicilio')";
  $ejecutarInsertar = mysqli_query($con, $insertarDatos);

  if ($ejecutarInsertar) {
    echo '
      <script>
      alert("Cliente Cargado Correctamente");
      window.location = "../cargar_usuarios.php";
      </script>
      ';
  } else {
    echo '
    <script>
        alert("Intentelo nuevamente,La carga del Cliente no ha sido Posible");
        window.location = "../cargar_usuarios.php";
    </script>
      ';
  }
}
