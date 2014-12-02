<?php

$id = $_GET['id'];
ConsultarErrores($id);

function ConsultarErrores($id){

 require 'Datos/ConexionBD.php';

 $consulta = "SELECT * FROM errores where id_error='$id'";
    //con mysql_query la ejecutamos en nuestra base de datos indicada anteriormente
    //de lo contrario mostraremos el error que ocaciono la consulta y detendremos la ejecucion.
    $resultado= @mysql_query($consulta) or die(mysql_error());
    while( $datos = mysql_fetch_assoc($resultado)) 
    {
     		$id = $datos['id_error'];
     		$nombre = $datos['nombre'];
     		$suceso = $datos['suceso'];
     		$proceso = $datos['proceso'];
            $prioridad = $datos['prioridad'];
            $fase = $datos['fase'];
            $sol = $datos['solucion'];
            $time = $datos['tiempo'];
     		//Mandamos el id al formulario que mostrar los errores :3
            echo '<div id="PanelAdminSol">';
                echo '<div id="AreasDeTexto">';
     	 	        echo '<label>Nombre del error:</label></br>';
                    echo '<textarea id="nombre" rows="1" cols="80">'.$nombre.'</textarea></br>';
                    echo '<label>Suceso del error:</label></br>';
                    echo '<textarea id="suceso" rows="6" cols="80">'.$suceso.'</textarea></br>';
                    echo '<label>Proceso del error:</label></br>';
                    echo '<textarea id="proceso" rows="6" cols="80">'.$proceso.'</textarea></br>';
                    echo '<label id="iddelerror" name="id">'.$id. '</label> </br>';
                    echo '<label id="lblprioridad" name="id">'."Prioridad:".'</label> </br>';
                    echo'<textarea id="priori" rows="1" cols="80">'.$prioridad.'</textarea></br>';
                    echo '<label id="lblfase" name="id">' ."Fase del ciclo de vida:". '</label> </br>';  
                    echo'<textarea id="priori" rows="1" cols="80">'.$fase.'</textarea></br>'; 
                    echo '<label id="lblfase" name="id">' ."Solucion:". '</label> </br>';  
                    echo'<textarea id="priori" rows="6" cols="80">'.$sol.'</textarea></br>'; 
                    echo '<label id="lblfase" name="id">' ."Tiempo:". '</label> </br>';  
                    echo'<textarea id="priori" rows="1" cols="80">'.$time.'</textarea></br>'; 
                echo '</div>';
            //echo '</div>';      
            
                echo '<img id="ImagenSol" width=700 height=500 src="Datos/MostrarImagen.php?id='.$id.'"></br>';  
            echo '</div>'; 

    }
}
   
?>

<HTML> 
    <head>
         
         <link rel="stylesheet" href="estilo.css" type="text/css" media="screen" /> 
         <link rel="stylesheet" href="estilodos.css" type="text/css" media="screen" />  
         <link rel="stylesheet" href="EstiloTecnico.css" type="text/css" media="screen" />     
       
    </head>
    <body>
   
	   <FORM ACTION="tecnico.php" METHOD="GET"> 
      
	</FORM>
    </body>
    </div>
</HTML> 