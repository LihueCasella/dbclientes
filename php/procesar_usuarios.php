<?php
include 'conexion_be.php';

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Comprobar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capturar los datos del formulario
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $apellido = mysqli_real_escape_string($conn, $_POST['apellido']);
    $dni = mysqli_real_escape_string($conn, $_POST['dni']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $telefono = mysqli_real_escape_string($conn, $_POST['telefono']);
    $domicilio = mysqli_real_escape_string($conn, $_POST['domicilio']);
    $cuentaCorriente = isset($_POST['cuentaCorriente']) ? 1 : 0; // Si está marcado, 1, si no, 0

    // Validación básica (puedes agregar más según tus necesidades)
    if (empty($nombre) || empty($apellido) || empty($dni) || empty($email) || empty($telefono) || empty($domicilio)) {
        echo "Todos los campos son obligatorios.";
        exit();
    }

    // Insertar datos en la base de datos
    $sql = "INSERT INTO usuarios (nombre, apellido, dni, email, telefono, domicilio, cuenta_corriente) 
            VALUES ('$nombre', '$apellido', '$dni', '$email', '$telefono', '$domicilio', '$cuentaCorriente')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "Nuevo usuario agregado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>
