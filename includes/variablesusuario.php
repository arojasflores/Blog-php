<?php
	
	include("/../conexion/conexion.php");

	
	$conexion = mysql_connect($dbservidor,$dbusuario,$dbcontrasena);
	if (isset($_SESSION['usuariotemporal'])) {
		if(mysql_select_db($dbnombre)){

			$peticion = "SELECT * FROM usuarios WHERE usuario ='".$_SESSION['usuariotemporal']."'";

			$ejecuto = mysql_query($peticion,$conexion);

			while ($fila = mysql_fetch_array($ejecuto)) {
				$_SESSION['usuario'] =  $fila['usuario'];
				$_SESSION['nombre'] =  $fila['nombre'];
				$_SESSION['apellido'] =  $fila['apellido'];
				$_SESSION['titulo'] =  $fila['titulo'];
				$_SESSION['descripcion'] =  $fila['descripcion'];
				$_SESSION['foto'] =  $fila['foto'];
				$_SESSION['webpersonal'] =  $fila['webpersonal'];
				$_SESSION['email'] =  $fila['email'];
				$_SESSION['usuario'] =  $fila['permisos'];
			}
		}
	}
	mysql_close($conexion);
?>