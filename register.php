<?php
// Conexi�n a la base de datos (actualiza con tus propias credenciales)
$servername = "tu_servidor";
$username = "tu_usuario";
$password = "tu_contrase�a";
$dbname = "usuarios";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexi�n
if ($conn->connect_error) {
    die("Conexi�n fallida: " . $conn->connect_error);
}

// Recibe los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$genero = $_POST['genero'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Cifra la contrase�a

// Prepara y ejecuta la consulta de inserci�n
$sql = "INSERT INTO usuarios (nombre, apellido, email, genero, fechaNacimiento, username, password) VALUES ('$nombre', '$apellido', '$email', '$genero', '$fechaNacimiento', '$username', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cierra la conexi�n
$conn->close();
?>
