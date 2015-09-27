<?php
	include("/../conexion/conexion.php");
	session_start();

	$codigoutc = $_GET['utc'];
	$conexion = mysql_connect($dbservidor,$dbusuario,$dbcontrasena);
	
	if(mysql_select_db($dbnombre)){

		$peticion = "SELECT * FROM post WHERE utc ='".$codigoutc."'";

		$ejecuto = mysql_query($peticion,$conexion);

		while ($fila = mysql_fetch_array($ejecuto)) {
			unlink("../".$fila['imagen']."");
		}

		mysql_close($conexion);
	}

	$conexion = mysql_connect($dbservidor,$dbusuario,$dbcontrasena);
	if(mysql_select_db($dbnombre)){

		$peticion = "DELETE FROM post WHERE utc='".$codigoutc."'";

		$ejecuto = mysql_query($peticion,$conexion);

	}
	mysql_close($conexion);

	header('Location: /../v2brain/index.php?u='.$_SESSION['usuariotemporal'].'');
?>