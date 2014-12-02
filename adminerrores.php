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
     		//Mandamos el id al formulario que mostrar los errores :3
            echo '<div id="PanelAdmin">';
                echo '<div id="AreasDeTexto">';
     	 	        echo '<label>Nombre del error:</label></br>';
                    echo '<textarea id="nombre" rows="1" cols="80">'.$nombre.'</textarea></br>';
                    echo '<label>Suceso del error:</label></br>';
                    echo '<textarea id="suceso" rows="6" cols="80">'.$suceso.'</textarea></br>';
                    echo '<label>Proceso del error:</label></br>';
                    echo '<textarea id="proceso" rows="6" cols="80">'.$proceso.'</textarea></br>';
                    echo '<label id="iddelerror" name="id">'.$id. '</label> </br>';
                    echo '<label id="prioridad" name="id">'."Puede Esperar".'</label> </br>';
                    echo '<label id="fase" name="id">' ."Analisis". '</label> </br>';   
                echo '</div>';
            //echo '</div>';      
            
                echo '<img id="ImagenError" width=700 height=500 src="Datos/MostrarImagen.php?id='.$id.'"></br>';  
            echo '</div>'; 

    }
}
   
?>

<HTML> 
    <head>
         <!--<link rel="stylesheet" href="estilo.css" type="text/css" media="screen" /> -->
         <link rel="stylesheet" href="estilodos.css" type="text/css" media="screen" />  
         <link rel="stylesheet" href="EstiloTecnico.css" type="text/css" media="screen" />     
        <script type="text/javascript">

        function PasarTecnico()
        {
            id = document.getElementById('iddelerror').innerHTML;
            name= document.getElementById('nombre').value;
            comen= document.getElementById('suceso').value;
            calif= document.getElementById('proceso').innerHTML;
            prioridad= document.getElementById('prioridad').innerHTML;
            fase= document.getElementById('fase').innerHTML;
            location.href="Datos/InsertarErrorTecnico.php?id="+id+"&nombre="+name+"&suceso="+comen+"&proceso="+calif+"&prioridad="+prioridad+"&fase="+fase+"";
        
        }

        function CheckBox()
        {
            var chburgente = document.getElementById("Urgente").checked;
            var chbintermedio = document.getElementById("Intermedio").checked;
            var chbesperar = document.getElementById("Esperar").checked;
            var chbanalisis = document.getElementById("Analisis").checked;
            var chbdisenio = document.getElementById("Disenio").checked;
            var chbimplement = document.getElementById("Implement").checked;
            var chbpruebas = document.getElementById("Pruebas").checked;

            if(chburgente == true)
            {
                document.getElementById("prioridad").innerHTML = "Urgente";
            }
            if(chbesperar == true)
            {
                document.getElementById("prioridad").innerHTML = "Puede Esperar";
            }
            if(chbintermedio == true)
            {
                document.getElementById("prioridad").innerHTML = "Intermedio";
            }
             if(chbanalisis == true)
            {
                document.getElementById("fase").innerHTML = "Analisis";
            }
            if(chbdisenio == true)
            {
                document.getElementById("fase").innerHTML = "Disenio";
            }
            if(chbimplement == true)
            {
                document.getElementById("fase").innerHTML = "Implementacion";
            }
            if(chbpruebas == true)
            {
                document.getElementById("fase").innerHTML = "Pruebas";
            }

           
        }

        </script>
    </head>
    <body>
   
	   <FORM ACTION="tecnico.php" METHOD="GET"> 
        <!-- <div id="PanelTecnico">    -->
            <div id="AreaCombo1">
		          <b>Prioridad:</b><br> 
		          <input type=checkbox id="Urgente" onClick="javascript:CheckBox()">Urgente<br> 
		          <input type=checkbox id="Intermedio" onClick="javascript:CheckBox()">Intermedio<br> 
		          <input type=checkbox id="Esperar" onClick="javascript:CheckBox()">Puede Esperar<br>
            </div> 
            <div id="AreaCombo2">
		          <b>Fase del ciclo de vida:</b><br> 
		          <input type=checkbox id="Analisis"  onClick="javascript:CheckBox()">Analisis<br> 
		          <input type=checkbox id="Disenio"  onClick="javascript:CheckBox()">Disenio<br> 
		          <input type=checkbox id="Implement"  onClick="javascript:CheckBox()">Implementacion<br>
		      <input type=checkbox id="Pruebas"  onClick="javascript:CheckBox()">Pruebas<br> 
            </div>
                <input type="button" id="btnenviar1" value="Enviar al Tecnico" onClick="javascript:PasarTecnico()"/> <br> 
        <!--</div>-->
	</FORM>
    </body>
    </div>
</HTML> 