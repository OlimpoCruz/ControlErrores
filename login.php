<?php
	require_once("sesion.class.php");

	$sesion = new sesion();
	
	if( isset($_POST["iniciar"]) )
	{
		
		$usuario = $_POST["usuario"];
		$password = $_POST["contrasenia"];
		$rolempleado = $_POST["Rol"];
		
		if(validarUsuario($usuario,$password,$rolempleado) == true)
		{			
			$sesion->set("usuario",$usuario);
			$sesion->setRol("Rol",$rolempleado);

			header("location: principal.php");
		}
		else 
		{
			echo "Verifica tu nombre de usuario y contrase�a";
		}
	}


	function validarUsuario($usuario, $password,$rolempleado)
	{
		$conexion = new mysqli("localhost","root","","blobimage");
		$consulta = "select contrasenia,Nombre from usuario where nick = '$usuario';";
		
		$result = $conexion->query($consulta);

		
		if($result->num_rows > 0)
		{
			$fila = $result->fetch_assoc();
			if( strcmp($password,$fila["contrasenia"]) == 0  &&  strcmp($rolempleado, $fila["Nombre"])==0){
				//echo $fila["contrasenia"];
				//echo $fila["Nombre"];
				return true;	
			}

			else					
				return false;
		}
		else
				return false;
	}

?>


<html>
<head>
<title>Login</title>
</head>

<body>
<form name="frmLogin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
  <div>
   <div> <label>Usuario: </label> <input type="text" name = "usuario"/></div>
    <div><label>Contraseña: </label> <input type="password" name = "contrasenia" /></div>
    <div><label>Rol: </label> <input type="text" name ="Rol" /></div>
    <div><input type="submit" name ="iniciar" value="Iniciar Sesion"/></div>
  </div>
</form>
</body>
</html>