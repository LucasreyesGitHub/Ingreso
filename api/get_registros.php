<?php
$host = 'bh9mruuijpmdvpps5dcm-mysql.services.clever-cloud.com';
$user = 'ubnyscrxodyrk7lx';
$password = 'gztpvRJ0dbis7xl0OxGC';
$dbname = 'bh9mruuijpmdvpps5dcm';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM registros ORDER BY fecha DESC, hora DESC";
$result = $conn->query($sql);

$registros = [];
while ($row = $result->fetch_assoc()) {
    $registros[] = $row;
}

echo json_encode($registros);

$conn->close();
?>
