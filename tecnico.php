<?php
function CargarDatos()
{
$id_recibido = $_GET['id'];
if (empty($id_recibido))
{
        $error = "El campo 1 esta vacio";
        echo $error;
        $id_recibido = 7;
}
else{
    require 'Datos/ConexionBD.php';
    $consulta = "SELECT * FROM errores where id_error='$id_recibido'";
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

           // echo'<label name="idsol" style="display:none;">'.$id.'</label></br>';
            echo '<div id="AreasDeTexto">';
            echo'<label>Nombre del error:</label></br>';
            echo'<textarea id="nombre" rows="1" cols="80">'.$nombre.'</textarea></br>';
            echo'<label>Suceso del error:</label></br>';
            echo'<textarea id="suceso" rows="6" cols="80">'.$suceso.'</textarea></br>';
            echo'<label>Proceso del error:</label></br>';
            echo'<textarea id="proceso" rows="6" cols="80">'.$proceso.'</textarea></br>';
            echo'<label>Prioridad del error:</label></br>';
            echo'<textarea id="priori" rows="1" cols="80">'.$prioridad.'</textarea></br>';
            echo'<label>Fase del error:</label></br>';
            echo'<textarea id="fas" rows="1" cols="80">'.$fase.'</textarea></br>';
            echo'<label>Solucion del error:</label></br>';

            echo'<textarea id="solucion" rows="6" cols="80" name="solucion"></textarea></br>';
            echo'<textarea id="idsol" rows="6" cols="80" name="idsol">'.$id.'</textarea></br>';
            echo'<textarea id="segundos" rows="1" cols="80" name="time">'."0 segundos".'</textarea></br>';
            echo '</div>';

            echo '<img id="ImagenError" width=700 height=500 src="Datos/MostrarImagen.php?id='.$id.'"></br>';


            //echo '<p id="segundos" name="time"> 0 segundos </p>';


        }

    }
}

?>

<HTML> 
    <HEAD>
        <link rel="stylesheet" href="estilodos.css" type="text/css" media="screen" />  
         <link rel="stylesheet" href="EstiloTecnico.css" type="text/css" media="screen" />  
        <script type="text/javascript">
        var BndDetener = false; 
        var myVar;

        function IniciarTimer(){
        myVar=setInterval(function () {mySegundero()}, 1000);

        }

        function PausarTimer(){
           //BndDetener = true; 
        alert("Se pauso el tiempo");
        window.clearInterval(myVar);
        
        }

        function mySegundero() {
            var segundero = document.getElementById("segundos").innerHTML;
            timer =  parseInt(segundero) + 1;
            document.getElementById("segundos").innerHTML = timer + " segundos";
        }

        function DetenerTimer(){
            alert("Se detuvo el tiempo"); 
            window.clearInterval(myVar);
            var segundero = document.getElementById("segundos").innerHTML = "0 segundos";

        }

        </script>     
    </HEAD>
        
    <BODY>
    <FORM action="Datos/InsertarSolucion.php" method="POST" > 

        <div id="PanelTecnico">
            <?php CargarDatos(); ?>
        </div>
        
        <!--<div id="ControlTimer">-->
         <input type="button" name="iniciar" value="Iniciar" onClick="javascript:IniciarTimer()"id="btninciar"/>  </br>
         <input type="button" name="pausar"  value="Pausar"onClick="javascript:PausarTimer()" id="btnpausar"/></br>
         <input type="button" name="detener" value="Detener" onClick="javascript:DetenerTimer()" id="btndetener"/></br>
         <input type="submit" name="detener" value="Enviar Solucion" id="btnenviar"/></br>
        <!--</div>-->

    </FORM>
    </BODY>
</HTML>

<!-- enctype="multipart/form-data"-->