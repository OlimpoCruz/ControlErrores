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
      //echo "<script language=’JavaScript’> alert(‘JavaScript dentro de PHP’); </script>";
      echo "Datos no validos";
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


<html lang="es"> 
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Login</title>
  <link rel="stylesheet" href="css/style.css">
 
</head>
<body>
  <section class="container">
    <div class="login">
      <h1>Login Control de Errores</h1>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="formul" >
        <p><input type="text" name="usuario" value="" placeholder="Nombre de Usuario"></p>
        <p><input type="password" name="contrasenia" value="" placeholder="Password"></p> 
        <select name="Rol" id="ComboRol">
            <option name="Rol0"> Cliente </option>
            <option name="Rol1"> Administrador </option>
            <option name="Rol2"> Tecnico </option>
        </select>

        <p class="submit"><input type="submit" name="iniciar" value="Login" ></p>
       
      </form>
    </div>

   
  </section>

  <section class="about">
    <p class="about-links">
    
    </p>
    <p class="about-author">
      &copy; 2014&ndash;2015 <a href="" target="_blank">Olimpo Cruz</a> -
      <a href="" target="_blank">VER & VAL </a><br>
      Original  by <a href="" target="_blank">ITESI</a>
  </section>
</body>
</html>




