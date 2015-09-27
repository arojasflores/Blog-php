<?php 

	session_start();
	session_destroy();

	header('Location: /../v2brain/index.php?login=no');

?>