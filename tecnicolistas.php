<?php
    require_once("sesion.class.php");
    
    $sesion = new sesion();

    $usuario = $sesion->get("usuario");
    $rol = $sesion->getRol("Rol");
    
    if( $usuario == false || $rol!="Tecnico")
    {   
        header("Location: logincss.php");      
    }
    else 
    {   
    ?>
    
    <HTML> 
        <title>Tecnico</title>
    <HEAD>
    </HEAD>
    <link rel="stylesheet" href="estilodos.css" type="text/css" media="screen" />       
    <BODY>
         <a href="cerrarsesion.php"> Cerrar Sesion </a>
    <FORM> 
        <div id="AreaAdmin">
              <div id="ImgErrorTec">
                <img src="error.png"></img>
            </div>
        <div id="listaerrorectec">
            <div class="listaerrores">
                <table>
                    <td>Errores:</td>
                    <?php ConsultarErrores(); ?>
                </table>
            </div>
        </div>
        </div>

    </FORM>
    </BODY>
</HTML>



<?php
    }   
?>





<?php
function ConsultarErrores(){
    
 require 'Datos/ConexionBD.php';
 $consulta = "SELECT * FROM errores where banderatec='Si' and banderasol='No'";
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
             echo "<tr><td><a href=tecnico.php?id=$id>".$nombre."</a></td></tr>"; //</td><td>'.$suceso.'</td></tr>
            //echo "<a href=tecnico.php?id=$id>".$nombre."</a> </br>"; //</td><td>'.$suceso.'</td></tr>
    }
    
}

?>

