<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "nombre_base_datos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta a la base de datos
$sql = "SELECT id, nombre, correo FROM usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["correo"] . "</td>";
        echo "<td><button class='btn btn-primary btn-sm'>Editar</button></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No hay datos disponibles</td></tr>";
}

$conn->close();
?>
