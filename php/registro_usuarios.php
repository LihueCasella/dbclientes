<?php
include 'conexion_be.php';

$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$confirmar_contrasena = $_POST['confirmar_contrasena'];


//register fuction
$query = "INSERT INTO usuarios(nombre_completo, Correo, usuario, contrasena, comfirmarcontrasena)
            VALUES('$nombre_completo','$correo', '$usuario', '$contrasena', '$confirmar_contrasena')";
$ejecutar = mysqli_query($conexion, $query);

if($ejecutar){
  echo'
  <script>
  alert("Usuario Registrado Correctamente");
  window.location = "../index.php";
  </script>
  ';
}else{
  echo '
<script>
    alert("Intentelo nuevamente, Usuario no registrado");
    window.location = "../index.php";
</script>
  ';
}
mysqli_close($conexion);









// Validar contraseñas
if (strlen($contrasena) < 8 || !preg_match('/[A-Z]/', $contrasena) || !preg_match('/\d/', $contrasena)) {
    echo '<script>
            alert("La contraseña debe tener al menos 8 caracteres, incluir una mayúscula y un número.");
            window.location = "../index.php";
          </script>';
    exit();
}

if ($contrasena !== $confirmar_contrasena) {
    echo '<script>
            alert("Las contraseñas no coinciden.");
            window.location = "../index.php";
          </script>';
    exit();
}

$query = "INSERT INTO usuarios(nombre_completo, Correo, usuario, contrasena, confirmar_contrasena) VALUES('$nombre_completo', '$correo', '$usuario', '$contrasena', '$confirmar_contrasena')";

// Verificar que los datos no se repitan en la DB
$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE Correo='$correo'");
if (mysqli_num_rows($verificar_correo) > 0) {
    echo '<script>
            alert("El correo electrónico que intentas usar ya se encuentra registrado, intenta con otro diferente");
            window.location = "../index.php";
          </script>';
    exit();
}

$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario'");
if (mysqli_num_rows($verificar_usuario) > 0) {
    echo '<script>
            alert("El nombre de usuario ya se encuentra registrado, intenta con otro diferente");
            window.location = "../index.php";
          </script>';
    exit();
}
?>
