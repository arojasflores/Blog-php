<?php
	session_start();


	
	if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {
		$usuarioenviado = $_POST['usuario'];
		$contrasenaenviada = $_POST['contrasena'];

		include("/../conexion/conexion.php");

		$conexion = mysql_connect($dbservidor,$dbusuario,$dbcontrasena);
		
		if(mysql_select_db($dbnombre)){
				$bandera = "nousuario";

			$peticion = "SELECT * FROM usuarios ";

			$ejecuto = mysql_query($peticion,$conexion);

			while ($fila = mysql_fetch_array($ejecuto)) {

				if ($fila['usuario'] == $usuarioenviado && $fila['contrasena'] == $contrasenaenviada) {
					$_SESSION['login'] = "yes";
					$_SESSION['usuariotemporal'] = $usuarioenviado;
					$bandera = "correcto";
					break;
					//header('Location: /../v2brain/index.php?u='.$fila['usuario'].'');
				}
				
			}//fin while
			if ($_POST['usuario'] == NULL || $_POST['contrasena'] == NULL) {
				$bandera = "nocampos";
			}
			mysql_close($conexion);
		}else{//fin if deteccion de base de datos
		echo "error al conectar con base de datos".mysql_error();
		mysql_close($conexion);
		}
	}// fin de verificacion de campos
	if($bandera == "nocampos"){
		//echo "complete los campos";
		$_SESSION['errorlog'] = $bandera;
		$_SESSION['login'] = "no";
		header('Location: /../v2brain/index.php');
	}
	if($bandera == "nousuario"){
		//echo "el usuario no existe";
		$_SESSION['errorlog'] = $bandera;
		$_SESSION['login'] = "no";
		header('Location: /../v2brain/index.php');
	}
	if($bandera == "correcto"){
		header('Location: /../v2brain/index.php?u='.$usuarioenviado.'');
	}
?>