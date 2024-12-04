<?php

    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Headers:*');
    header('Content-Type: aplication/json');

    $json = file_get_contents('php://input');
    $usuario = json_decode($json);

    $servername = "localhost";
    $username = "root";
    $password = "blu3dr4g0n18";
    $dbname = "prueba1";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn -> connect_error){
        echo "error al realizar la conexión";
    }

    $insertarAlumno = "INSERT INTO alumnos (nombre, email, contraseña) VALUES ('$usuario->username', '$usuario->email', '$usuario->password')";

    if ($conn -> query($insertarAlumno)) {
        echo json_encode([
            "status" => "success",
            "message" => "Se insertó correctamente a: $nombre"
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "No se logró registrar al usuario: $nombre"
        ]);
    }

    //cierra la conexión con la base de datos
    $conn -> close();
?>