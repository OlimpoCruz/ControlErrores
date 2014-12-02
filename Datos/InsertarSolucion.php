 <?php

 $id = $_POST["idsol"];
 $solucion = $_POST["solucion"];
 $tiempo = $_POST["time"];

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
$sql = "UPDATE errores SET banderasol='Si',solucion='$solucion',tiempo='$tiempo	' WHERE id_error='$id'";
if (mysqli_query($conn, $sql)) {
    echo "Tu solucion fue insertada";

} else {
    echo"Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>