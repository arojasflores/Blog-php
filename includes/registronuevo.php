<article style = "background-color: rgba(7,78,89,0.7); border-radius: 20px;">
	<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-6"><h1>Formulario de registro:</h1></div>
		<div class="col-sm-4"></div>
	</div>
	<br>
	<div class="row">	
		<div class="col-sm-3"></div>
		<div class="col-sm-9">
			<form class="navbar" role="search" action="includes/procesarusuario.php" method="post" enctype="multipart/form-data" accept-charset="utf-8">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Usuario</label>
					<div class="col-sm-10">
						<input type="text" name="usuario" class="form-control" placeholder="Usuario"><br>
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Contraseña</label>
					<div class="col-sm-10">
						<input type="password" name="contrasena" class="form-control" placeholder="Contraseña"><br>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<input type="email" name="email" class="form-control" placeholder="Email"><br>
					</div>
				</div>

				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" name="nombre" class="form-control" placeholder="Usuario"><br>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Apellido</label>
					<div class="col-sm-10">
						<input type="text" name="apellido" class="form-control" placeholder="Apellido"><br>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Titulo</label>
					<div class="col-sm-10">
						<input type="text" name="titulo" class="form-control" placeholder="Titulo"><br>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Descrpcion</label>
					<div class="col-sm-10">
						<input type="text" name="descripcion"  class="form-control" placeholder="Descrpcion"><br>
					</div>
				</div>
				
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Pagina Web</label>
					<div class="col-sm-10">
						<input type="text" name="webpersonal" class="form-control" placeholder="Pagina Web"><br>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Foto de perfil</label><br>
					<div class="col-sm-10">
						
						<input name="imagen" class="btn btn-info" type="file" value="Subir" /><br>
						
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input type="submit"class="btn btn-info" value="Registrate"/>
					</div>
				</div>	
			</form>
		</div>
	</div>
</article>
