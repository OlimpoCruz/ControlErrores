<?php

//Variables recibidas por get para que sean insertadas con la bandera para que el tecnico las revice (autorizacion del admin)
$id = $_GET['id'];
$nombre = $_GET['nombre'];
$suceso = $_GET['suceso'];
$proceso = $_GET['proceso'];
$prioridad = $_GET['prioridad'];
$fase = $_GET['fase'];



//variables para la conexion de la BD
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blobimage";


// Se crea la conexion con la BD
$conn = new mysqli($servername, $username, $password, $dbname);
// Se prueba la conexion, en caso de error arrojarlo.
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//hacemos la actualizacion con la prioridad, la fase y la bandera para que el tecnico los revice autorizado por el administrador.
$sql = "UPDATE errores SET prioridad='$prioridad',fase='$fase',banderatec='Si' WHERE id_error='$id'";
if (mysqli_query($conn, $sql)) {
    echo "Tu error fue enviado al tecnico";

} else {
    echo"Error: " . $sql . "<br>" . mysqli_error($conn);
}


?>


