<?php
include 'conexion_be.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dni = $_POST['dni'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$domicilio = $_POST['domicilio'];


//register fuction
$query = "INSERT INTO clientes(nombre, apellido, dni, correo, telefono, domicilio)
            VALUES('$nombre', '$apellido', '$dni', '$correo', '$telefono', '$domicilio')";
$ejecutar = mysqli_query($conexion, $query);

if($ejecutar){
  echo'
  <script>
  alert("Cliente cargado con exito");
  window.location = "../cargar_usuarios.php";
  </script>
  ';
}else{
  echo '
<script>
    alert("fallo al cargar el cliente, intentelo nuevamente");
    window.location = "../cargar_usuarios.php";
</script>
  ';
}
mysqli_close($conexion);
?>
