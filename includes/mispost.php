<?php
	include("/../conexion/conexion.php");

	$conexion = mysql_connect($dbservidor,$dbusuario,$dbcontrasena);
	
	if(mysql_select_db($dbnombre)){

		$peticion = "SELECT * FROM post WHERE usuario ='".$_SESSION['usuariotemporal']."'";

		$ejecuto = mysql_query($peticion,$conexion);
		$num_registros = mysql_num_rows($ejecuto);

		$registros = 2;
		$pagina= 1 ;
		if (isset($_GET['page'])) {
			$pagina = $_GET['page'];	
		}
			
		if (isset($pagina) && is_numeric($pagina)) {
			$inicio = (($pagina - 1) * $registros);
		}else{
			$inicio = 0;
		}

		$peticion = "SELECT * FROM post WHERE usuario ='".$_SESSION['usuariotemporal']."' ORDER BY utc DESC LIMIT ".$inicio.",".$registros." ";

		$ejecuto = mysql_query($peticion,$conexion);


		while ($fila = mysql_fetch_array($ejecuto)) {
			echo '<article>
					<div class="row">
						<div class="col-sm-5">
							<p align="center"><img class="img-responsive img-rounded" src="'.$fila['imagen'].'"></p>
						</div>
						
						<div class="col-sm-7">
							<time>'.$fila['dia'].'-'.$fila['mes'].'-'.$fila['anio'].'</time>
							<h1>'.$fila['titulo'].'</h1>
							<h3>'.$fila['subtitulo'].'</h3>
							<p>'.$fila['texto'].'</p>
							<br>
					
							<a class="btn btn-danger" href="includes/eliminarpost.php?utc='.$fila['utc'].'">Eliminar</a>
							<a class="btn btn-info" href="index.php?imgmod='.$fila['imagen'].'&titulo='.$fila['titulo'].'&subtitulomod='.$fila['subtitulo'].'&textomod='.$fila['texto'].'&editando=yes&utc='.$fila['utc'].'">Modificar</a>
						</div>
					</div>
					<hr>
				</article>';
		}
		$paginas = ceil($num_registros / $registros);

		echo '
			<div class="row">
				<div class="col-sm-4">
				</div>
				<div class="col-sm-4">
					<ul class="pagination">';
		if ($pagina>1) {
			echo '<li><a href="index.php?page='.($pagina - 1).'">Anterior</a></li>';
		}	
			for ($i=1; $i <=$paginas ; $i++) { 
				if ($i == $pagina) {
					echo '<li class="active"><a href="index.php?page='.$i.'" >'.$i.'</a></li>';
				}else{
					echo '<li><a href="index.php?page='.$i.'" >'.$i.'</a></li>';
				}
			}	
		if ($pagina<$paginas) {
			echo '<li><a href="index.php?page='.($pagina + 1).'">Siguiente</a></li>';
		}
			echo '		</ul>
					</div>
					<div class="col-sm-4">
					</div>
				</div>';
	}
	mysql_close($conexion);
?>