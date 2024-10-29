<?php

include 'conexion_be.php';

$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$confirmar_contrasena = $_POST['confirmar_contrasena'];

$query = "INSERT INTO usuarios(nombre_completo, Correo, usuario, contrasena, comfirmarcontrasena)
VALUES('$nombre_completo', '$correo', '$usuario', '$contrasena', '$confirmar_contrasena')";


//verificar que los datos no se repitan en la db

$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE Correo='$correo' ");

if (mysqli_num_rows($verificar_correo) > 0) {
    echo ' 
            <script>
                alert("El correo electronico que intentas usar ya se encuentra registrado, intenta con otro diferente");
                window.location = "../index.php";
            </script>
    ';
    exit();
    mysqli_close($conexion);
}


$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario' ");

if (mysqli_num_rows($verificar_usuario) > 0) {
    echo ' 
            <script>
                alert("El nombre de usuario ya se encuentra registrado, intenta con otro diferente");
                window.location = "../index.php";
            </script>
    ';
    exit();
    mysqli_close($conexion);
}

$ejecutar = mysqli_query($conexion, $query);
if ($ejecutar) {
    echo '
            <script>
                alert("Registro con exito");
                window.location = "../index.php";
            </script>
        ';
} else {
    echo '
    <script>
    alert("El usuario no ha podido registrarse intentelo nuevamente");
    window.location = "../index.php";
</script>

  ';
}

mysqli_close($conexion);
