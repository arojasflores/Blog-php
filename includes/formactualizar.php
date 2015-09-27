<?php
	$titulomod = $_GET['titulo'];
	$subtitulomod = $_GET['subtitulomod'];
	$textomod = $_GET['textomod'];
	$img = $_GET['imgmod'];
	$utcmod	= $_GET['utc'];
?>
	<article style = "background-color: rgba(255,255,0,0.5); border-radius: 20px;">
		<div class="row">
			<div class="col-sm-5">
				<p align="center"><img class="img-responsive img-rounded" src="<?php echo $img ?>"></p>
			</div>
			
			<div class="col-sm-7">
				<time></time>
				<form class="navbar" role="search" action="includes/modificarpost.php" method="post" accept-charset="utf-8">
						<label>Titulo</label>
						<input type="text" class="form-control" name="titulopost" value="<?php echo $titulomod; ?>" placeholder="Ingrese un titulo"><br>
						<label>Subtitulo</label>
						<input type="text" class="form-control" name="subtitulopost" value="<?php echo $subtitulomod; ?>" placeholder="Ingrese un subtitulo"><br>
						<label>Texto</label>
						<textarea name="textopost" class="form-control" placeholder="Ingrese texto" value="<?php echo $textomod; ?>"></textarea><br>
						<input name="imagen" class="btn btn-warning" type="file" value="Subir" /><br>
					<button type="submit"class="btn btn-warning">Nuevo Post</button>
					<input type="hidden" value="<?php echo $utcmod; ?>" name="utcmod">
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