<?php
	
	$bd = new SQLite3('hola.db');

	/*$peticion = "CREATE TABLE articulos(
				titulo varchar(50),
				autor varchar(25),
				editorial varchar(25)
				)";

	$bd->query($peticion);*/

	$peticion = "INSERT INTO articulos VALUES(
				'Nose',
				'Un tipo',
				'Diada'
				)";

	$bd->exec($peticion);


	$peticion = "SELECT * FROM articulos;";

	$resultado = $bd->query($peticion);

	while($fila = $resultado->fetchArray()){
		echo $fila['titulo']."<br>";
		echo $fila['autor']."<br>";
		echo $fila['editorial']."<br>";
	}
	/*
	$rows = count ($resultado); 
	echo $rows; 
	*/ //Cuenta cuantas datos tiene la tabla
	$bd->close();

?>