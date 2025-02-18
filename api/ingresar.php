<?php
// Permitir solicitudes desde cualquier origen (CORS)
// Si solo quieres permitir solicitudes desde tu dominio, cambia "*" por la URL de tu dominio.
header("Access-Control-Allow-Origin: *"); // Cambia "*" por tu dominio si lo deseas
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, X-Requested-With");

$host = 'bh9mruuijpmdvpps5dcm-mysql.services.clever-cloud.com';
$user = 'ubnyscrxodyrk7lx';
$password = 'gztpvRJ0dbis7xl0OxGC';
$dbname = 'bh9mruuijpmdvpps5dcm';

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

