<?php
    $servername = "localhost";
    $username = "root";
    $password = "blu3dr4g0n18";
    $dbname = "prueba1";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn -> connect_error){
        echo json_encode([
            "status" => "error",
            "message" => "No se pudo recuperar la lista de usuarios"
        ]);
    }

    $select_usuarios = "SELECT * FROM alumnos";

    $resultado = $conn -> query($select_usuarios);

    $conn -> close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar usuarios</title>
</head>
<body>
    <?php
    echo json_encode([
        "status" => "success",
        "data" => $resultado -> fetch_all()
    ]);
    ?>
</body>
</html>