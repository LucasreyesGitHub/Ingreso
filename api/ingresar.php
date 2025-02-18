<?php
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

