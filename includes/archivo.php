<aside class=" container color">
			<div class="row">
					<div class="col-sm-2">
						
					</div>
					<div class="col-sm-8">
					 	<div class="postan">
							<h2>Post anteriores</h2>
							<table class="table">
							 	<tr>
									<td><strong>Titulo</strong></td>
									<td><strong>Subtitulo</strong></td>
									<td><strong>Fecha</strong></td>
								</tr>
								
									<?php
									include("/../conexion/conexion.php");

									$conexion = mysql_connect($dbservidor,$dbusuario,$dbcontrasena);
									
									if(mysql_select_db($dbnombre)){
										if ($_SESSION['login'] == "yes") {
											$peticion = "SELECT * FROM post WHERE usuario ='".$_SESSION['usuariotemporal']."' ORDER BY utc DESC LIMIT 20 OFFSET 3";
										}else{
											$peticion = "SELECT * FROM post ORDER BY utc DESC LIMIT 20 OFFSET 5";
										}
										$ejecuto = mysql_query($peticion,$conexion);
										while ($fila = mysql_fetch_array($ejecuto)) {
											echo '
													<tr>
														<td><a href="index.php?articulo=yes&utc='.$fila['utc'].'">'.$fila['titulo'].'</a></td>
														<td><a href="index.php?articulo=yes&utc='.$fila['utc'].'">'.$fila['subtitulo'].'</a></td>
														<td><a href="index.php?articulo=yes&utc='.$fila['utc'].'">'.$fila['dia'].'-'.$fila['mes'].'-'.$fila['anio'].'</a></td>
													</tr>
												  ';
										}

									}
									mysql_close($conexion);
									?>

							</table>
						</div>
					</div>
					<div class="col-sm-2">
					
					</div>
				</div>
		</aside>