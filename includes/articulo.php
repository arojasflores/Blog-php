<?php
	$utcarticulo = $_GET['utc'];
	
	include("/../conexion/conexion.php");

	$conexion = mysql_connect($dbservidor,$dbusuario,$dbcontrasena);
	
	if(mysql_select_db($dbnombre)){

		$peticion = "SELECT * FROM post WHERE utc ='".$utcarticulo."'";

		$ejecuto = mysql_query($peticion,$conexion);

		while ($fila = mysql_fetch_array($ejecuto)) {
			echo '<article>
					<div class="row">
						<div class="col-sm-5">
							<p align="center"><img class="img-responsive img-rounded" src="img/'.$fila['icono'].'.jpg"></p>
						</div>
						
						<div class="col-sm-7">
							<time>'.$fila['dia'].'-'.$fila['mes'].'-'.$fila['anio'].'</time>
							<h1>'.$fila['titulo'].'</h1>
							<h3>'.$fila['subtitulo'].'</h3>
							<p>'.$fila['texto'].'</p>
							<br>
					';
						if ($_SESSION['login'] == "yes") {

							echo '
							<a class="btn btn-danger" href="includes/eliminarpost.php?utc='.$fila['utc'].'">Eliminar</a>
							<a class="btn btn-success" href="index.php?imgmod='.$fila['icono'].'&titulo='.$fila['titulo'].'&subtitulomod='.$fila['subtitulo'].'&textomod='.$fila['texto'].'&editando=yes&utc='.$fila['utc'].'">Modificar</a>
							';
						}
			
			echo'			</div>
					</div>
					<div class="row">
						<div class="col-sm-4"></div>
						<div class="col-sm-5"></div>
						<div class="col-sm-3"><p align="right"><a class="btn btn-info" href="index.php?articulo=no">Volver atras</a></p></div>
					</div>
					<hr>
				</article>';
		}
	}
						
	mysql_close($conexion);
?>