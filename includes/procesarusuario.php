<?php
	
	session_start();
	$contador = 0;
	
	//recibo variables
	$usuario = $_POST['usuario'];
	$contrasena = $_POST['contrasena'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$titulo = $_POST['titulo'];
	$descripcion = $_POST['descripcion'];
	$foto = $_POST['foto'];
	$webpersonal = $_POST['webpersonal'];
	$email = $_POST['email'];
	
	//compruebo si existe el usuario en la base de datos
	include("../conexion/conexion.php");

	$conexion = mysql_connect($dbservidor,$dbusuario,$dbcontrasena);
	
	if(mysql_select_db($dbnombre)){

		$peticion = "SELECT * FROM usuarios";

		$ejecuto = mysql_query($peticion,$conexion);

		while ($fila = mysql_fetch_array($ejecuto)) {
			if ($fila['usuario'] == $usuario){
				$contador ++;
			}
		}
	}
	mysql_close($conexion);


	//creo e inserto nuevo usuario
	if ($contador == 0) {

		$nombre_foto = $_FILES["imagen"]["name"]; 
		$tipo_foto = $_FILES["imagen"]["type"]; 
		$tamano_foto = $_FILES["imagen"]["size"];  
	
		if ($tipo_foto == "image/jpg" || $tipo_foto == "image/jpeg" || $tipo_foto == "image/png" || $tipo_foto == "image/gif") {
			if ($tamano_foto > 5000000) {
				header('Location: /../v2brain/index.php?registronuevo=yes&error=tamano');
			}else{
				$carpeta = '../img/';
			    $destino = $carpeta.$nombre_foto; 
			    opendir($carpeta);
			    copy($_FILES['imagen']['tmp_name'],$destino);

				$destino = 'img/'.$nombre_foto;


				$conexion = mysql_connect($dbservidor,$dbusuario,$dbcontrasena);																											

				if(mysql_select_db($dbnombre)){

					$peticion = "INSERT INTO usuarios VALUES('".$usuario."','".$contrasena."','".$nombre."','".$apellido."','".$titulo."','".$descripcion."','".$destino."','".$webpersonal."','".$email."',3)";

					$ejecuto = mysql_query($peticion,$conexion);

					header('Location: /../v2brain/index.php');
				}
				mysql_close($conexion);
			}
	  	}else{
	  		echo "tipo de imagen incorrecta";
	  	}
	

	}else{
		echo "El usuario creado ya existe";
	}	

?>