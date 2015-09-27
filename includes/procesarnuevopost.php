<?php
	session_start();

	$usuario = $_SESSION['usuariotemporal'];

	$tituloform = $_POST['titulopost'];
	$subtituloform = $_POST['subtitulopost'];
	$textoform = $_POST['textopost'];

	$postutc = date('U');
	$postanio = date('Y');
	$postmes = date('m');
	$postdia = date('d');
	$posthora = date('H');
	$postminuto = date('i');
	$postsegundo = date('s');


	//tratar la imagen
	$nombre_foto = $_FILES["imagen"]["name"]; 
	$tipo_foto = $_FILES["imagen"]["type"]; 
	$tamano_foto = $_FILES["imagen"]["size"];  
	  
		if ($nombre_foto == NULL && $tipo_foto == NULL && $tamano_foto == NULL) {
			header('Location: /../v2brain/index.php?imagenexiste=no&');
		}else{
			if ($tipo_foto == "image/jpg" || $tipo_foto == "image/jpeg" || $tipo_foto == "image/png" || $tipo_foto == "image/gif") {
				if ($tamano_foto > 5000000) {
					header('Location: /../v2brain/index.php?imagentamano=yes&');
				}else{
					$carpeta = '../img/';
				    $destino = $carpeta.$nombre_foto; 
				    opendir($carpeta);
				    copy($_FILES['imagen']['tmp_name'],$destino);

					$destino = 'img/'.$nombre_foto;
					include("../conexion/conexion.php");

					$conexion = mysql_connect($dbservidor,$dbusuario,$dbcontrasena);
					
					if(mysql_select_db($dbnombre)){

						$peticion = "INSERT INTO post VALUES('".$postutc."','".$postanio."','".$postmes."','".$postdia."','".$posthora."','".$postminuto."','".$postsegundo."','".$tituloform."','".$subtituloform."','".$usuario."','','".$textoform."','".$destino."','','')";

						$ejecuto = mysql_query($peticion,$conexion);

					}
					mysql_close($conexion);
				}
			
				header('Location: /../v2brain/index.php');
			}else{
				header('Location: /../v2brain/index.php?imagentipo=yes&u='.$usuario.'');

			}
		}
?>