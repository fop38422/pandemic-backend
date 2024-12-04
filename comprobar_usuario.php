<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json');

$json = file_get_contents('php://input');
$user = json_decode($json);

$servername = "localhost";
$username = "root";
$password = "blu3dr4g0n18";
$dbname = "prueba1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(false);
    exit;
}

$comprobarAlumno = "SELECT * FROM alumnos WHERE nombre = '$user->username'";
$resultado = $conn->query($comprobarAlumno);
$usuario = $resultado->fetch_assoc();

if ($usuario && $usuario['contraseña'] == $user->password) {
    echo json_encode(true);
} else {
    echo json_encode(false);
}

$conn->close();
