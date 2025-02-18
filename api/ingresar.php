<?php
$host = 'tu_base_de_datos_host';
$user = 'tu_usuario';
$password = 'tu_contraseña';
$dbname = 'tu_base_de_datos';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$hora = date('H:i:s');

$sql = "INSERT INTO registros (email, accion, fecha, hora) VALUES ('$email', 'ingreso', CURDATE(), '$hora')";

if ($conn->query($sql) === TRUE) {
    echo "Ingreso registrado exitosamente.";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>

