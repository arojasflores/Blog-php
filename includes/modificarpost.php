<?php
	session_start();

	$utcmod = $_POST['utcmod'];
	$titulo = $_POST['titulopostmodificar'];
	$subtitulo = $_POST['subtitulopostmodificar'];
	$texto = $_POST['textopostmodificar'];

	//definiciones de imagen
	$nombre_foto = $_FILES["imagen"]["name"]; 
	$tipo_foto = $_FILES["imagen"]["type"]; 
	$tamano_foto = $_FILES["imagen"]["size"];  



	if ($nombre_foto == NULL && $tipo_foto == NULL && $tamano_foto == NULL) {
		header('Location: /../v2brain/index.php?imagenexiste=no&editando=yess');
	}else{
		if ($tipo_foto == "image/jpg" || $tipo_foto == "image/jpeg" || $tipo_foto == "image/png" || $tipo_foto == "image/gif") {
			if ($tamano_foto > 5000000) {
				header('Location: /../v2brain/index.php?imagentamano=yes&u='.$usuario.'');
			}else{
				$carpeta = '../img/';
			    $destino = $carpeta.$nombre_foto; 
			    opendir($carpeta);
			    copy($_FILES['imagen']['tmp_name'],$destino);

				$destino = 'img/'.$nombre_foto;
				include("/../conexion/conexion.php");

				$conexion = mysql_connect($dbservidor,$dbusuario,$dbcontrasena);
				
				if(mysql_select_db($dbnombre)){

					$peticion = " UPDATE post SET titulo='".$titulo."' , foto='".$destino."' , subtitulo='".$subtitulo."' , texto='".$texto."' WHERE utc='".$utcmod."' ";

					$ejecuto = mysql_query($peticion,$conexion);	

				mysql_close($conexion);
				header('Location: /../v2brain/index.php?');
				}
			}
		
			header('Location: /../v2brain/index.php');
		}else{
			header('Location: /../v2brain/index.php?imagentipo=yes');
		}
	}

?>