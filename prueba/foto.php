<?php
	$nombre_foto = $_FILES["imagen"]["name"]; 
	$tipo_foto = $_FILES["imagen"]["type"]; 
	$tamano_foto = $_FILES["imagen"]["size"];  
	 
	echo $nombre_foto;	echo "<br>";
	echo $tipo_foto;echo "<br>";
	echo $tamano_foto;echo "<br>";
	
		if ($tipo_foto == "image/jpg" || $tipo_foto == "image/jpeg" || $tipo_foto == "image/png" || $tipo_foto == "image/gif") {
		if ($tamano_foto > 5000000) {
		echo "es una imagen muy grande";
		}  
			$carpeta = '../img/';
		    $destino = $carpeta.$nombre_foto; 
		    opendir($carpeta);
		    copy($_FILES['imagen']['tmp_name'],$destino);
		echo '<img src="'.$destino.'" alt="">';

	echo $destino;echo "<br>";
		}else{
			echo "no es tipo correcto";		
		}
?>