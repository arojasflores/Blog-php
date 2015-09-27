<?php 
	session_start(); 
	include("includes/variablesusuario.php");
	
	//verificacion de edicion
	if (isset($_GET['editando'])) {
		$editando = $_GET['editando'];
	} else {
		$editando = "no";
	}
	//verificacion de edicion de registro
	if (isset($_GET['modificando'])) {
		$modificando = $_GET['modificando'];
	} else {
		$modificando = "no";
	}
	//verificacion de ver un post particular
	if (isset($_GET['articulo'])) {
		$articulo = $_GET['articulo'];
	} else {
		$articulo = "no";
	}
	//verificacion de logeo
	if (isset($_SESSION['login'])) {
	} else {
		$_SESSION['login'] = "no";
	}
	//verificacion de no haber escrito nada en el form de inicio de sesion
	if (isset($_SESSION['denegado'])) {
	} else {
		$_SESSION['denegado'] = "no";
	}
	//verificacion de nuevo registro
	if (isset($_GET['registronuevo'])) {
		$registronuevo = $_GET['registronuevo'];
	} else {
		$registronuevo = "no";
	}
	


?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<title>Blog</title>
	</head>
	<body>
		
		<header id="header" class="">
			<div class="container color">
				<img src="img/banner.jpg" alt="" class="img-responsive">
			</div>
		</header><!-- /header -->


		<nav class="color container">
			<div class="row">
				<div class="col-sm-6">
					<ul>
						<li><a href="#" >Inicio</a></li>
						<li><a href="#" >Post</a></li>
						<li><a href="#" >Contacto</a></li>
					</ul>
				</div>
			    <!-- Brand and toggle get grouped for better mobile display -->
				<div class="col-sm-6">
				    <div class="usuario navbar-header navbar-right">
						
					  <?php  
						  if ($_SESSION['login'] == "yes") {
						  	echo '<a href="includes/unlog.php" class="btn btn-default btn-lg btn-block">Click aqui para cerrar sesion</a>';
						  }else{
							  	
								echo'<form class="navbar-form" action="includes/login.php" role="search" method="post">
										<div class="form-group">
											<label class="sr-only" for="exampleInputEmail2">Usuario</label>
											<input name="usuario" type="texto" class="form-control" id="exampleInputEmail2" placeholder="Ingrese usuario">
										</div>
										<div class="form-group">
											<label class="sr-only" for="exampleInputPassword2">Contraseña</label>
											<input name="contrasena" type="password" class="form-control"  placeholder="Ingrese contraseña">
										</div>
										<button type="submit" class="btn btn-default">Ingresar</button>
									</form>';
								if (isset($_SESSION['errorlog'])) {
									if ($_SESSION['errorlog'] == "nocampos") {
										echo '<p align="center" style="color: red;">Complete los campos</p>';
									}
									if ($_SESSION['errorlog'] == "nousuario") {
										echo '<p align="center" style="color: red;">El usuario es inexistente</p>';
									}
								}
						  }
					  ?>
				    </div><!-- /.navbar-collapse -->
			    </div>
		    </div>
		    <br>
		    <?php if ($_SESSION['login'] != "yes") {
					echo'   <div class="row">
								<div class="col-sm-7">
								</div>
								<div class="col-sm-4">
									<a href="index.php?registronuevo=yes" class="btn btn-success btn-lg btn-block">Registrate</a>
								</div>
								<div class="col-sm-1">	
							</div>';
			} ?>
		</nav>
		
		

		<section class=" container color">
				<?php
					if ($_SESSION['login'] == "yes") {
					echo '<article>
							<hr>
							<div class="row">
								<div class="col-sm-3">
									<p align="center"><img width="150px"src="'.$_SESSION['foto'].'" class="img-rounded"></p>
								</div>
								<div class="col-sm-5">
									<ul>
										<li>
											<p><span>Nombre:</span> '.$_SESSION['nombre']." ".$_SESSION['apellido'].'</p>
										</li>
										<li>
											<p><span>Descripcion:</span> '.$_SESSION['descripcion'].'</p>
										</li>
										
										<li>
											<p><span>Web:</span>  '.$_SESSION['webpersonal'].'</p>
										</li>
									</ul>
								</div>
								<div class="col-sm-4">
								<p></p>
								</div>
							</div>
						</article>';
					}else{
						echo '<article>
							<div class="row">
								<div class="col-sm-3">
								</div>
								<div class="col-sm-6">
									<h1>Puede ver todos los post publicados</h1>
									<h3>Registrate para crear los tuyos!!</h3>
								</div>
								<div class="col-sm-3">
								<p></p>
								</div>
							</div>
						</article>';
					}
		echo	'<hr>';

					if ($registronuevo == "yes") {
							include("includes/registronuevo.php");
						}else{
							if ($articulo == "yes") {
								include("includes/articulo.php");
							}else{
								
								if ($_SESSION['login'] == "yes") {
									if ($modificando == "yes") {
										//
									}else{										
										if ($editando == "no") {
											include("includes/crearnuevopost.php");
											include("includes/mispost.php");
										}else{
											include("includes/formactualizar.php");
										} 	
									}
								}else{
									include("includes/post.php");
								}
							}
						}
				?>
		</section>
		<?php
			
			if ($editando == "no" && $registronuevo == "no") {
				include("includes/archivo.php");
			}
		?>
		
		<?php include("includes/footer.php"); ?>
			
	</body>
	<script src="/js/bootstrap.js" type="text/javascript" charset="utf-8" async defer></script>
</html>