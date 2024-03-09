<?php
// Conexión a la base de datos (actualiza con tus propias credenciales)
$servername = "tu_servidor";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "usuarios";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibe los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$genero = $_POST['genero'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Cifra la contraseña

// Prepara y ejecuta la consulta de inserción
$sql = "INSERT INTO usuarios (nombre, apellido, email, genero, fechaNacimiento, username, password) VALUES ('$nombre', '$apellido', '$email', '$genero', '$fechaNacimiento', '$username', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cierra la conexión
$conn->close();
?>
