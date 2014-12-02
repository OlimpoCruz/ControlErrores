<?php
    require_once("sesion.class.php");
    
    $sesion = new sesion();

    $usuario = $sesion->get("usuario");
    $rol = $sesion->getRol("Rol");
    
    if( $usuario == false || $rol!="Cliente")
    {   
        header("Location: logincss.php");      
    }
    else 
    {   
    ?>
    
   <html>
	<head>
		<link rel="stylesheet" href="estilodos.css" type="text/css" media="screen" />  

		<title>Cliente</title>
	</head>
	<body>
		<a href="cerrarsesion.php"> Cerrar Sesion </a>
		<form action="Datos/SubirImagen.php" method="POST" enctype="multipart/form-data">
		<div id="AreaCliente">
			<div id="AreaSubir">
		    <input type="file" name="imagen" id="imagen"/></br>
			</div>
		    <label id="lblnombre">Nombre del error:</label></br>
		    <input type="text" name="nombre" id="nombredelerror"/></br>
		    <label id="lblnombre">Suceso:</label></br>
		    <textarea name="suceso" id="suceso" rows="6" cols="80"></textarea></br>
		    <label id="lblnombre">Proceso:</label></br>
		    <textarea  name="proceso" id="proceso" rows="6" cols="80"></textarea></br>
		    <input type="submit" id="subir" name="subir" value="Enviar"/>
		</div>
		  
		</form>
	</body>
</html>
   

<?php
    }   
?>

