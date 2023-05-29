<!doctype html>
<html>

    <head>
        <meta charset="utf-8">
        <title>Formulario de Registro SCIII</title>
        <link href="estilos.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <div class="group">

            <form method="POST" action="">
            <h2><em>Formulario de Registro</em></h2>

        <label for="nombre">Nombre <span><em>(requerido)</em></span></label>
        <input type="text" name="nombre" class="form-input" required/>

        <label for="apellido">Apellido <span><em>(requerido)</em></span></label>
        <input type="text" name="apellido" class="form-input" required/>

        <label for="email">Email <span><em>(requerido)</em></span></label>
        <input type="email" name="email" class="form-input" required/>
        
        <input class="form-bnt" name="submit" type="submit" value="Suscribirse"/>

<?php

if($_POST){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];

    //conexión con PDO

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "04_practica";

    //Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    //Check connection
    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO usuario (nombre, apellido, email)
    VALUES ('$nombre', '$apellido', '$email')";

    if ($conn->query ($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
$conn->close();

}

?>

        </form>
        </div>
    </body>
</html>

