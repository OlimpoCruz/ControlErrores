<?php
	require_once("sesion.class.php");
	
	$sesion = new sesion();

	$usuario = $sesion->get("usuario");
	$rol = $sesion->getRol("Rol");
	
	if( $usuario == false)
	{	
		header("Location: login.php");		
	}
	else 
	{
		switch ($rol) {

			case 'Cliente':
				header("Location: cliente.php");	
				break;


			case 'Administrador':
				header("Location: adminlistas.php");	
				break;

			case 'Tecnico':
				header("Location: tecnicolistas.php");	
				break;
			
			default:
				//echo "errorrrr";
				header("Location: logincss.php");
				break;
		}

	}	
?>