<?php
// Permitir solicitudes desde cualquier origen (CORS)
header("Access-Control-Allow-Origin: *"); // Cambia "*" por tu dominio si lo deseas
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, X-Requested-With");

// Establecer conexión con la base de datos
$host = 'bh9mruuijpmdvpps5dcm-mysql.services.clever-cloud.com';
$user = 'ubnyscrxodyrk7lx';
$password = 'gztpvRJ0dbis7xl0OxGC';
$dbname = 'bh9mruuijpmdvpps5dcm';

$conn = new mysqli($host, $user, $password, $dbname);

// Verificar si hay error en la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validar si el email está presente en el POST
if (!isset($_POST['email']) || empty($_POST['email'])) {
    echo "Error: El correo electrónico es obligatorio.";
    exit();
}

// Sanitizar el correo electrónico para evitar inyecciones de tipo XSS
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

// Validar si el correo electrónico tiene un formato correcto
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Error: El correo electrónico no tiene un formato válido.";
    exit();
}

// Obtener la hora actual
$hora = date('H:i:s');

// Usar una consulta preparada para evitar inyecciones SQL
$sql = "INSERT INTO registros (email, accion, fecha, hora) VALUES (?, 'ingreso', CURDATE(), ?)";

$stmt = $conn->prepare($sql);

// Verificar si la consulta se preparó correctamente
if ($stmt === false) {
    echo "Error en la preparación de la consulta: " . $conn->error;
    exit();
}

// Vincular parámetros a la consulta
$stmt->bind_param('ss', $email, $hora);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Ingreso registrado exitosamente.";
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
