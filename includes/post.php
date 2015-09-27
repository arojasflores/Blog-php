<?php
	include("/../conexion/conexion.php");

	$conexion = mysql_connect($dbservidor,$dbusuario,$dbcontrasena);
	
	if(mysql_select_db($dbnombre)){

		$peticion = "SELECT * FROM post";

		$ejecuto = mysql_query($peticion,$conexion);
		$num_registros = mysql_num_rows($ejecuto);

		$registros = 5;
		$pagina= 1 ;
		if (isset($_GET['page'])) {
			$pagina = $_GET['page'];	
		}
			
		if (isset($pagina) && is_numeric($pagina)) {
			$inicio = (($pagina - 1) * $registros);
		}else{
			$inicio = 0;
		}

		$peticion = "SELECT * FROM post ORDER BY utc DESC LIMIT ".$inicio.",".$registros."";

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
	<!-- 
			public function getSubString($string, $length=NULL)
			{
			    //Si no se especifica la longitud por defecto es 50
			    if ($length == NULL)
			        $length = 50;
			    //Primero eliminamos las etiquetas html y luego cortamos el string
			    $stringDisplay = substr(strip_tags($string), 0, $length);
			    //Si el texto es mayor que la longitud se agrega puntos suspensivos
			    if (strlen(strip_tags($string)) > $length)
			        $stringDisplay .= ' ...';
			    return $stringDisplay;
			}

			funcion para devolver una parte de una cadena
	-->