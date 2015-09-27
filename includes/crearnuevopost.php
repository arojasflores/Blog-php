		
		<article style = "background-color: rgba(30,121,12,0.7); border-radius: 20px;">
			<div class="row">
				<div class="col-sm-5">
					<h1 align="center">Crea tu post</h1>
					
				</div>
				
				<div class="col-sm-7">
					<time></time>
					<form class="navbar" role="search" action="includes/procesarnuevopost.php" method="post" enctype="multipart/form-data" accept-charset="utf-8">
						<label>Titulo</label>
						<input type="text" class="form-control" name="titulopost" value="" placeholder="Ingrese un titulo"><br>
						<label>Subtitulo</label>
						<input type="text" class="form-control" name="subtitulopost" value="" placeholder="Ingrese un subtitulo"><br>
						<label>Texto</label>
						<textarea name="textopost" class="form-control" placeholder="Ingrese texto"></textarea><br>
						<input name="imagen" class="btn btn-success" type="file" value="Subir" /><br>
						<input type="submit"class="btn btn-success" value="Nuevo Post"/>
						<?php 
							if (isset($_GET['imagennoesta']) && ($_GET['imagennoesta'] == "yes")){
								echo '<br><br><p style="color:#AF0808;">El tipo de imagen es incorrecto</p>';
							}
							if (isset($_GET['imagentipo']) && ($_GET['imagentipo'] == "yes")) {
								echo '<br><br><p style="color:#AF0808;">El tipo de imagen es incorrecto</p>';
							}
							if (isset($_GET['imagentamano']) && ($_GET['imagentamano'] == "yes")) {
								echo '<br><br><p style="color:#AF0808;">La imagen debe ser menor a 5mb</p>';
							}
							if (isset($_GET['imagenexiste']) && ($_GET['imagenexiste'] == "no")) {
								echo '<br><br><p style="color:#AF0808;">Inserte una imagen</p>';
							}
						?>
					</form>
				</div>
			</div>
		</article>