<?php
    require_once("sesion.class.php");
    
    $sesion = new sesion();

    $usuario = $sesion->get("usuario");
    $rol = $sesion->getRol("Rol");
    
    if( $usuario == false || $rol!="Administrador")
    {   
        header("Location: logincss.php");      
    }
    else 
    {   
    ?>
    
    <html>
    <head>
        <link rel="stylesheet" href="estilodos.css" type="text/css" media="screen" />  
        <title>Administrador</title>
    </head>
    <body>
        <a href="cerrarsesion.php"> Cerrar Sesion </a>
         <div id="AreaAdmin">
            <div id="ImgError">
                <img src="error.png"></img>
            </div>
            <div class="listaerrores" >
            <table>
                <td>Errores:</td>
                <!--<tr colspan="2">Errores:</tr>-->
                <!--<th>Nombre del error:</th>-->
                <!--<th>Suceso del error:</th>-->
                <?php ConsultarErrores(); ?>
            </table>
            </div>
            <div id="ImgSol">
                <img src="sol.png"></img>
            </div>
            <div class="listasoluciones" >
            <table >
                 <td>Solucion:</td>
                <td> Tiempo:</td>
                <?php ConsultarSoluciones(); ?>
            </table>
            </div>
           
        </div>
    </body>
</html>
   

<?php
    }   
?>





<?php

function ConsultarErrores(){

 require 'Datos/ConexionBD.php';
 $consulta = "SELECT * FROM errores where banderasol='No' and banderatec='No'";
    //con mysql_query la ejecutamos en nuestra base de datos indicada anteriormente
    //de lo contrario mostraremos el error que ocaciono la consulta y detendremos la ejecucion.
    $resultado= @mysql_query($consulta) or die(mysql_error());
    
    while( $datos = mysql_fetch_assoc($resultado)) 
    {
     		$id = $datos['id_error'];
     		$nombre = $datos['nombre'];
     		$suceso = $datos['suceso'];
     		$proceso = $datos['proceso'];

     		//Mandamos el id al formulario que mostrar los errores :3
            echo "<tr><td><a href=adminerrores.php?id=$id>".$nombre."</a></td></tr>"; //</td><td>'.$suceso.'</td></tr>
    }


}


function ConsultarSoluciones(){
 require 'Datos/ConexionBD.php';
 $consulta = "SELECT * FROM errores where banderasol='Si'";
    //con mysql_query la ejecutamos en nuestra base de datos indicada anteriormente
    //de lo contrario mostraremos el error que ocaciono la consulta y detendremos la ejecucion.
    $resultado= @mysql_query($consulta) or die(mysql_error());
    while( $datos = mysql_fetch_assoc($resultado)) 
    {
     		$id = $datos['id_error'];
     		$nombre = $datos['nombre'];
     		$tiempo = $datos['tiempo'];

     		//Mandamos el id al formulario que mostrar los errores :3
            echo "<tr><td><a href=adminsoluciones.php?id=$id>".$nombre."</a></td><td>".$tiempo."</td></</tr>";
    }
}


?>